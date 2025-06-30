<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showUniversalLoginForm()
    {
        return view('auth.universal-login');
    }

    public function universalLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember');

        // Coba login sebagai Admin
        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        if (Auth::guard('member')->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/anggota/dashboard'); // arahkan ke dashboard
        }

       return back()->with('error', 'Email atau password salah.');

    }

    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }

        if (Auth::guard('member')->check()) {
            Auth::guard('member')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}

