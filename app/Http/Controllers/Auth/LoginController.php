<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function index() {
        // Hien thi form login
        return view('client.auth.login');
    }
    public function login(Request $request) {
        // Xử lý logic login
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logout()
    {
        // Hủy phiên đăng nhập
        Auth::logout();

        // Chuyển hướng người dùng về trang chủ (hoặc bất kỳ trang nào bạn muốn)
        \request()->session()->invalidate();
        return redirect('/')->with('success', 'Bạn đã đăng xuất thành công!');
    }
    public function verify($token)
    {
        $email = base64_decode($token);
        $user = User::where('email', $email)->whereNull('email_verified_at')->first();

        if ($user) {
            $user->update(['email_verified_at' => now()]);
            return redirect()->route('home.index')->with('status', 'Email verified successfully!');
        }

        return redirect()->route('home.index')->withErrors(['message' => 'Invalid verification link or already verified']);
    }

}
