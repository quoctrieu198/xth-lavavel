<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function index()
    {
        // hien thi view trang dang ky
//        dd('Trang dang ky')
        return view('client.auth.register');
    }
    public function register(Request $request)
    {
        // xu ly logic dang ky
//        dd($request->all());
        $data = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);
        // tao users moi
        $user = User::query()->create($data);
        // Login voi user vua tao
        Auth::login($user);
        // gen lai token cho user vua dang nhap
        $request->session()->regenerate();

        // xác thực tài khoản
        $token = base64_encode($user->email);
        Mail::to($user->email)->send(new VerifyEmail($token, $user->name));
        //quay lai trang phia truoc
        return redirect()->intended('/');
    }
}
