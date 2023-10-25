<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    public function index() {
        // echo "halo admin ".Auth::user()->name;
        // echo "<a href='/logout'>logout</a>";
        return view('layouts.view.admin.layouts.home');
    }

    public function usersAll() {
        $users = User::with('role')->get();
        return view('layouts.view.admin.layouts.userall', compact('users'));
    }

    public function usersAdmin() {

    }

    public function usersMitra() {

    }

    public function usersUser() {

    }

    public function editUser($id) {
        // Mengambil data pengguna berdasarkan ID
        $user = User::find($id);

        return view('admin.users.edit', ['user' => $user]);
    }

    public function viewUser($id) {
        // Mengambil data pengguna berdasarkan ID
        $user = User::find($id);

        return view('admin.users.view', ['user' => $user]);
    }
    public function deleteUser($id) {
        // Mengambil data pengguna berdasarkan ID
        $user = User::find($id);
    
        if ($user) {
            // Menghapus pengguna jika ditemukan
            $user->delete();
        }
    
        return redirect()->route('admin.user.alluser')->with('success', 'Pengguna berhasil dihapus.');
    }    

}
