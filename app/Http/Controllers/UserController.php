<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        // echo "halo user ".Auth::user()->name;
        // echo "<a href='/logout'>logout</a>";

        return view('layouts.homepage.home');
    }
}
