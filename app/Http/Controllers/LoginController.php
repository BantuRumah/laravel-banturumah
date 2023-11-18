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
                'g-recaptcha-response' => 'required|captcha',
            ],
            [
                'email.required' => 'Email wajib diisi',
                'email.email' => 'Format email tidak valid',
                'password.required' => 'Password wajib diisi',
                'password.regex' => 'Password harus mengandung setidaknya 8 karakter, satu huruf besar, satu huruf kecil, dan satu angka.',
                'g-recaptcha-response' => [
                    'required' => 'Please verify that you are not a robot.',
                    'captcha' => 'Captcha error! try again later or contact site admin.',
                ],
            ]
        );

        $infologin = $request->only('email', 'password');

        if(Auth::attempt($infologin)) {
            if(Auth::user()->role == 'admin') {
                return redirect('/admin/dashboard')->with('success', 'Anda berhasil login');
            } else if(Auth::user()->role == 'mitra') {
                return redirect('/mitra')->with('success', 'Anda berhasil login');
            } else if(Auth::user()->role == 'user') {
                return redirect('/user')->with('success', 'Anda berhasil login');
            }
            return response()->json(['success' => 'Anda telah berhasil login']);
        } else {
            return redirect('/login')->with('error', 'Gagal login, email atau password salah');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('');
    }
}
