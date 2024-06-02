<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Rules\MatchOldPassword;

class ProfileController extends Controller
{
    // Hiển thị trang hồ sơ người dùng
    public function show()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        return view('web.update_my_profile', ['user' => $user]);
    }

    //Update
    public function updateProfile(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        ]);

        $user = User::findOrFail($id);
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->save();

        // Return a success response
        return redirect()->route('profile')
            ->with('success', 'Profile updated successfully.');
    }

    //Delete
    public function destroyProfile(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('home')->with('success2', 'Profile deleted successfully.');
    }

    public function changePassword(Request $request)
    {
        if ($request->filled('oldpass') && $request->filled('newpass') && $request->filled('confirmpass')) {
            // Xác minh mật khẩu cũ và quy tắc hợp lệ
            $request->validate([
                'oldpass'     => ['required', 'string', 'min:8', new MatchOldPassword],
                'newpass'     => ['required', 'string', 'min:8', 'different:oldpass'],
                'confirmpass' => ['required', 'same:newpass'],
            ]);

            // Xác minh mật khẩu cũ
            if (!Hash::check($request->input('oldpass'), auth()->user()->password)) {
                return redirect()->back()->with('error', 'The old password is incorrect.');
            }

            User::find(auth()->user()->id)->update(['password' => Hash::make($request->input('newpass'))]);
            // DB::commit();

            return redirect()->route('profile')->with('success', '
            Password was successfully changed.');
        } else {
            return redirect()->back()->with('error', 'Please fill in all password fields.');
        }
    }
}
