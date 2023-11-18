<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        $showPassword = true;
        return view('layouts.auth.lainnya.app-register', compact('showPassword'));
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/'],
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
            'password.regex' => 'Password harus mengandung setidaknya 8 karakter, satu huruf besar, satu huruf kecil, dan satu angka.',
            'password.confirmed' => 'Konfirmasi password tidak cocok dengan password.',
        ]);
    
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => 'user', // Set peran sebagai "user"
        ]);
    
        return redirect('/login')->with('success', 'Anda telah berhasil melakukan registrasi');
    }
    
}
