<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            "email" => "required",
            "password" => "required|min:8"
        ], [
            "email.required" => "Email harus diisi",
            "password.required" => "Password harus diisi",
            "password.min" => "Password harus terdiri dari minimal 8 karakter"
        ]);

        $data = array(
            "email" => $request->email,
            "password" => $request->password,
        );
        if (Auth::attempt($data)) {
            // Jika login berhasil, redirect ke halaman dashboard
            return redirect()->route('dashboard')->with('success', 'Login berhasil');
        } else {
            // Jika login gagal, kembali ke halaman login dengan pesan error
            return redirect()->back()->with('error', 'Email atau password salah');

        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->with('success', 'Anda telah berhasil logout');
    }
}
