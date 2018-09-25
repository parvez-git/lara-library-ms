<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $email    = $request->email;
        $password = $request->password;
        $remember = $request->remember_token;

        if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => 1], $remember)) {

            return redirect()->intended('dashboard');
        }

        return redirect()->route('login')->withErrors('Credentials do not match or user not active!');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
