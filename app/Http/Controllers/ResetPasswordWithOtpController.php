<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\SendOtp;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class ResetPasswordWithOtpController extends Controller
{
    public function showRequestForm()
    {
        return view('web.email_with_otp');
    }

    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email address not found.']);
        }

        // Sinh OTP và gửi đến email
        //OTP GỒM gồm 6 chữ số để gửi
        $otp = rand(100000, 999999);

        // Lưu OTP vào cơ sở dữ liệu
        $user->otp = $otp;
        $user->otp_expires_at = now()->addMinutes(10);
        $user->save();

        // Gửi email với OTP
        try {
            Mail::to($user->email)->send(new SendOtp($otp));
        } catch (\Exception $e) {
            // Ghi log lỗi khi gửi email
            Log::error('Failed to send OTP email: ' . $e->getMessage());

            return back()->withErrors(['email' => 'Failed to send OTP. Please try again later.']);
        }

        return redirect()->route('password.reset.withotp.verify')->with('email', $request->email)->with('success', 'Email with OTP has been sent successfully.');;
    }

    public function showVerifyForm(Request $request)
    {
        return view('web.verify_otp', ['email' => session('email')]);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|numeric',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::where('email', $request->email)->where('otp', $request->otp)->first();

        // if (!$user || Carbon::parse($user->otp_expires_at)->isPast()) {
        //     return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
        // }
        if (!$user || now()->greaterThan($user->otp_expires_at)) {
            return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
        }

        $user->password = bcrypt($request->password);
        $user->otp = null;
        $user->otp_expires_at = null;
        $user->save();

        return redirect()->route('login')->with('status', 'Password has been reset successfully.');
    }
}