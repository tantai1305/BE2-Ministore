<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Hiển thị form đăng ký
    public function showRegisterForm()
    {
        return view('register');
    }

    // Xử lý đăng ký người dùng
    public function register(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        Auth::login($user);

        return redirect()->route('login')->with('success', 'Bạn đã đăng ký thành công!'); // Đảm bảo route 'home' tồn tại
    }

    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('login');
    }

    // Xử lý đăng nhập
    // public function login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();
    //         return redirect()->intended('home'); // Đảm bảo route 'home' tồn tại
    //     }

    //     return back()->withErrors([
    //         'email' => 'The provided credentials do not match our records.',
    //     ]);
    // }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('home')->with('success', 'Login successful!');
        }

        $user = \App\Models\User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Thông tin đăng nhập không khớp với hồ sơ của chúng tôi.')->withInput();
        }

        return redirect()->route('login')->with('error', 'Mật khẩu không chính xác.')->withInput();
    }

    // Đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();  // Log out the current user

        $request->session()->invalidate();  // Invalidate the session
        $request->session()->regenerateToken();  // Regenerate the CSRF token

        return redirect('/home');  // Redirect to login page
    }
}