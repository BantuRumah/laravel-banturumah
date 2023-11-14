<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mitra;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index() {
        $userCount = User::count();
        $transactionCount = Transaksi::count();
        return view('layouts.view.admin.layouts.homes.home', ['userCount' => $userCount, 'transactionCount' => $transactionCount]);
    }

    public function usersAdmin() {
        $adminUsers = User::where('role', 'admin')->get();
        return view('layouts.view.admin.layouts.users.useradmin', compact('adminUsers'));
    }   
    
    public function createUser() {
        $mitra = Mitra::all();
        return view('layouts.view.admin.layouts.users.formuser.create', compact('mitra'));
    }
    
    public function storeUser(Request $request) {
        // Validate the form data
        $request->validate([
            'profile_picture' => 'image|mimes:jpeg,png,jpg',
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'role' => 'required|in:admin,mitra,user',
            'telephone' => 'required|numeric',
            'alamat' => 'required',
            'password' => ['required', 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,}$/'],
        ]);
    
        // Initialize a variable to store the image path
        $imageName = null;
    
        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/profile_pictures', $imageName);
        }
    
        // Create the user and save the image path
        $userData = [
            'profile_picture' => $imageName, // Save the image path
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'telephone' => 'required|numeric',
            'alamat' => 'required',
            'password' => Hash::make($request->input('password')),
        ];
    
        if ($request->input('role') === 'mitra') {
            $userData['mitra_id'] = $request->input('mitra_id');
        }
    
        $user = User::create($userData);
    
        return redirect()->route('admin.user.alluser')->with('success', 'Pengguna berhasil dibuat.');
    }
        

    public function editUser($id) {
        // Mengambil data pengguna berdasarkan ID
        $user = User::find($id);
        $mitra = Mitra::all(); // Get all Mitra data
    
        return view('layouts.view.admin.layouts.users.formuser.edit', compact('user', 'mitra'));
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
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:admin,mitra,user',
            'telephone' => 'required|numeric',
            'alamat' => 'required',
            'password' => ['nullable', 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,}$/'],
        ]);
    
        // Temukan pengguna yang akan diubah berdasarkan ID
        $user = User::find($id);

        // Perbarui data pengguna dengan data baru dari form edit
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->telephone = $request->input('telephone');
        $user->alamat = $request->input('alamat');

        // Enkripsi kata sandi hanya jika kata sandi baru telah diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Mengunggah foto profil baru jika ada
        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/profile_pictures', $imageName);
            $user->profile_picture = $imageName;
        }

        // Hapus foto profil jika checkbox "Remove Profile Picture" dipilih
        if ($request->input('remove_profile_picture') == 1) {
            // Hapus foto profil lama
            if ($user->profile_picture) {
                Storage::delete('public/profile_pictures/' . $user->profile_picture);
                $user->profile_picture = null;
            }
        }

        // Update mitra_id if the user role is 'mitra'
        if ($request->input('role') === 'mitra') {
            $user->mitra_id = $request->input('mitra_id');
        } else {
            $user->mitra_id = null; // Or handle accordingly if role is not 'mitra'
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
