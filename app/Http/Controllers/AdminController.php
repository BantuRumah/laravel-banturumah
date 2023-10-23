<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() {
        // echo "halo admin ".Auth::user()->name;
        // echo "<a href='/logout'>logout</a>";
        return view('layouts.view.admin.lainnya.app-admin');
    }
}
