<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index() {
        return view('layouts.auth.lainnya.app-login');
    }

    public function login(Request $request) {
        $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/'],
            ],
            [
                'email.required' => 'Email wajib diisi',
                'email.email' => 'Format email tidak valid',
                'password.required' => 'Password wajib diisi',
                'password.regex' => 'Password harus mengandung setidaknya 8 karakter, satu huruf besar, satu huruf kecil, dan satu angka.',
            ]
        );

        $infologin = $request->only('email', 'password');

        if(Auth::attempt($infologin)) {
            if(Auth::user()->role == 'admin') {
                return redirect('/admin');
            } else if(Auth::user()->role == 'mitra') {
                return redirect('/mitra');
            } else if(Auth::user()->role == 'user') {
                return redirect('/user');
            }
            // return redirect('admin');
        } else {
            return redirect('/login')->with('error', 'User or password not available')->withInput();
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('');
    }
}
