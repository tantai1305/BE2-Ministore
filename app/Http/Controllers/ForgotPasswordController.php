<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Log;


class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        // Validate the request
        $request->validate(['email' => 'required|email']);
        
        // Attempt to send the reset link and log the input email
        $email = $request->only('email');
        Log::info('Attempting to send password reset link to email: ' . $email['email']);

        $status = Password::sendResetLink($email);

        // Log the status for debugging purposes
        Log::info('Password reset link status: ' . ($status ?? 'null'));

        // Check the status and return the appropriate response
        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('success', __('Password reset link has been sent to your email address.'));
        } else {
            // Handle null status explicitly
            if (is_null($status)) {
                return back()->withErrors(['email' => __('Password reset link could not be sent. Please try again later.')]);
            }
            return back()->withErrors(['email' => __($status)]);
        }
    }
}