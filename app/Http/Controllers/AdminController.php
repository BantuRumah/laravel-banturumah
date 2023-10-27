<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index() {
        // echo "halo admin ".Auth::user()->name;
        // echo "<a href='/logout'>logout</a>";
        return view('layouts.view.admin.layouts.homes.home');
    }

    public function usersAll() {
        $users = User::with('role')->get();
        return view('layouts.view.admin.layouts.users.userall', compact('users'));
    }

    public function usersAdmin() {
        // Mengambil pengguna dengan role "admin"
        $adminUsers = User::where('role', 'admin')->get();
        
        return view('layouts.view.admin.layouts.users.useradmin', compact('adminUsers'));
    }    

    public function usersMitra() {
        // Mengambil pengguna dengan role "admin"
        $mitraUsers = User::where('role', 'mitra')->get();
        
        return view('layouts.view.admin.layouts.users.usermitra', compact('mitraUsers'));
    }

    public function usersUser() {
        // Mengambil pengguna dengan role "admin"
        $adminUsers = User::where('role', 'user')->get();
        
        return view('layouts.view.admin.layouts.users.useruser', compact('userUsers'));
    }

    public function editUser($id) {
        // Mengambil data pengguna berdasarkan ID
        $user = User::find($id);

        return view('layouts.view.admin.layouts.users.formuser.edit', ['user' => $user]);
    }

    public function viewUser($id) {
        // Mengambil data pengguna berdasarkan ID
        $user = User::find($id);

        return view('layouts.view.admin.layouts.users.formuser.view', ['user' => $user]);
    }

    public function updateUser(Request $request, $id)
    {
        // Validasi data yang dikirimkan oleh form edit
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id, // Agar email yang diubah tetap unik kecuali untuk pengguna saat ini
            'role' => 'required|in:admin,mitra,user', // Sesuaikan aturan validasi sesuai dengan kebutuhan Anda
            'password' => ['required', 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,}$/'],
        ]);
    
        // Temukan pengguna yang akan diubah berdasarkan ID
        $user = User::find($id);
    
        // Perbarui data pengguna dengan data baru dari form edit
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
    
        // Enkripsi kata sandi hanya jika kata sandi baru telah diisi
        if (!empty($request->input('password'))) {
            $user->password = Hash::make($request->input('password'));
        }
    
        // Simpan perubahan ke dalam database
        $user->save();
    
        return redirect()->route('admin.user.alluser')->with('success', 'Data pengguna berhasil diperbarui.');
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
