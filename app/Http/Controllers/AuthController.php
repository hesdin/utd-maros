<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('auth.login');
    }

    public function loginProses(Request $request)
    {
        $creds = $request->only('email', 'password');

        if (Auth::attempt($creds)) {
            return redirect()->route('dashboard');
        } else {
            return back()->with('fail', 'Email atau Password salah!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.page');
    }
}
