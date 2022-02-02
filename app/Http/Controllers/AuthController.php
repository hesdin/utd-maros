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

        // Validate
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:3',
        ],
        [
            'email.exists' => 'This email is not exists'
        ]);

        $creds = $request->only('email', 'password');

        if (Auth::attempt($creds)) {
            return redirect()->route('dashboard');
        } else {
            return back()->with('fail', 'Gagal Login, Email atau Password salah !');
        }
    }
}
