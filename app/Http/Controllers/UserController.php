<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Transaksi;
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

    public function mitraList() {
        // Fetch the list of "mitra" roles that the "user" can rent
        // $mitraRoles = Role::where('role', 'mitra')->get();

        $mitra = Mitra::leftJoin('users', 'users.mitra_id', '=', 'mitra.id')
            ->select('mitra.*', 'users.name as user_name', 'users.profile_picture as user_profile_picture')
            ->get();

            $transaksi = Transaksi::where('user_id', auth()->id())->first();

            return view('layouts.homepage.transaksi', compact('mitra', 'transaksi'));
    }

}
