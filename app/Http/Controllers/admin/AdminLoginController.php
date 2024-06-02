<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminLoginController extends Controller
{
    public function showLogin()
    {
        return view('admin.loginAdmin');
    }
    public function checkLogin(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Authentication passed...
        $user = Auth::user();
        if ($user->role == 1) {
            // User is admin
            return redirect()->intended('admin/index');
        } else {
            // User is not admin
            Auth::logout();
            return redirect()->back()->withErrors(['permissionError' => 'Bạn không có quyền truy cập vào trang quản trị.']);
        }
    } else {
        // Authentication failed...
        return redirect()->back()->withErrors(['loginError' => 'Thông tin đăng nhập không chính xác.']);
    }
}
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();  // Invalidate the session
        $request->session()->regenerateToken();  // Regenerate the CSRF token

        return redirect(route('loginAdmin'));  // Redirect to login page
    }
}
