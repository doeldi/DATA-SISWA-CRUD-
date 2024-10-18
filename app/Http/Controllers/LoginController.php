<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Ambil data login
        $credentials = $request->only('email', 'password');

        // Proses login
        if (Auth::attempt($credentials)) {
            // Redirect ke halaman dashboard atau halaman yang diinginkan
            return redirect()->intended('/');
        }

        // Jika login gagal, kembalikan ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
