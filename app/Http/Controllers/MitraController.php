<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MitraController extends Controller
{
    public function index() {
        echo "halo mitra ".Auth::user()->name;
        echo "<a href='/logout'>logout</a>";
    }
}