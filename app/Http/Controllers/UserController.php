<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Transaksi;
use App\Http\Controllers\UserProfileController;
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

    public function mitraList(Request $request) {
        // Mengambil parameter dari query string
        $selectedLayanan = $request->query('layanan');
        $searchTerm = $request->query('search');

        // Mengambil daftar layanan unik dari database
        $layananList = Mitra::distinct()->pluck('layanan');
    
        // Membuat kueri dasar
        $mitraQuery = Mitra::leftJoin('users', 'users.mitra_id', '=', 'mitra.id')
            ->select('mitra.*', 'users.name as user_name', 'users.profile_picture as user_profile_picture');
    
        // Menambahkan pencarian berdasarkan nama mitra jika ada kata kunci pencarian
        if ($searchTerm) {
            $mitraQuery->where(function ($query) use ($searchTerm) {
                $query->where('users.name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('mitra.name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('layanan', 'like', '%' . $searchTerm . '%')
                    ->orWhere('umur', 'like', '%' . $searchTerm . '%')
                    ->orWhere(function ($query) use ($searchTerm) {
                        if (strpos($searchTerm, '-') === 0) {
                            $status = substr($searchTerm, 1);
                            $query->where('status', 'not like', '%' . $status . '%');
                        } else {
                            $query->orWhere(function ($query) use ($searchTerm) {
                                if (strpos($searchTerm, '+') === 0) {
                                    $status = substr($searchTerm, 1);
                                    $query->where('status', 'like', '%' . $status . '%');
                                } else {
                                    $query->orWhere('status', 'like', '%' . $searchTerm . '%');
                                }
                            });
                        }
                    })
                    ->orWhere('harga', 'like', '%' . $searchTerm . '%');
            });
        }
    
        // Jika selectedLayanan tidak kosong, tambahkan filter berdasarkan layanan
        if (!empty($selectedLayanan)) {
            $mitraQuery->where('layanan', $selectedLayanan);
        }
    
        // Mengambil hasil akhir
        $mitra = $mitraQuery->get();
    
        // Mengambil transaksi (jika diperlukan)
        $transaksi = Transaksi::where('user_id', auth()->id())->first();
    
        // Mengirim data ke tampilan
        return view('layouts.homepage.transaksi', compact('mitra', 'transaksi', 'layananList', 'selectedLayanan'));
    }

    // public function mitraList() {
    //     // Fetch the list of "mitra" roles that the "user" can rent
    //     // $mitraRoles = Role::where('role', 'mitra')->get();

    //     $mitra = Mitra::leftJoin('users', 'users.mitra_id', '=', 'mitra.id')
    //         ->select('mitra.*', 'users.name as user_name', 'users.profile_picture as user_profile_picture')
    //         ->get();

    //         $transaksi = Transaksi::where('user_id', auth()->id())->first();

    //         return view('layouts.homepage.transaksi', compact('mitra', 'transaksi'));
    // }

}
