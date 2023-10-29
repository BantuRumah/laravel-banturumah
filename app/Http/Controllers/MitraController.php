<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MitraController extends Controller
{
    public function index() {
        // echo "halo mitra ".Auth::user()->name;
        // echo "<a href='/logout'>logout</a>";
        return view('layouts.homepage.home');
    }

    public function mitraUsers() {
        $mitraUsers = User::where('role', 'mitra')->get();
        return view('layouts.view.admin.layouts.users.usermitra', compact('mitraUsers'));
    }    

}
