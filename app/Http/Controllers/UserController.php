<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        // echo "halo user ".Auth::user()->name;
        // echo "<a href='/logout'>logout</a>";

        return view('layouts.homepage.home');
    }

    public function userUsers() {
        $userUsers = User::where('role', 'user')->get();
        return view('layouts.view.admin.layouts.users.useruser', compact('userUsers'));
    }    

}
