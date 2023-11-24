<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UserProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user(); // Dapatkan user yang sedang login
        return view('layouts.view.admin.layouts.users.edit_profiles.edit_profiles', compact('user')); // Mengirimkan data user ke view
    }
    public function update(Request $request)
    {
        // Validasi request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'telephone' => 'required|numeric',
            'alamat' => 'required|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg',
            'password' => ['nullable', 'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,}$/'],
        ]);

        // Dapatkan user yang sedang login
        $user = Auth::user();

        $updateData = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'telephone' => $validatedData['telephone'],
            'alamat' => $validatedData['alamat'],
        ];

        // Handle password update (only if provided and not empty)
        if (!empty($validatedData['password'])) {
            $updateData['password'] = Hash::make($validatedData['password']);
        }

        // Handle file upload
        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/profile_pictures', $imageName);
            $updateData['profile_picture'] = $imageName;

        }

        // Update user
        $user->update($updateData);

        // Redirect to the profile edit page with a success message
        Alert::success('Success', 'Profile has been updated successfully!');

        // Redirect ke halaman profil
        return redirect()->route('profile1.update')->with('profile_updated', 'Profile has been updated successfully!');
        // return redirect()->route('profile1.update')->with('success', 'Profil berhasil diperbarui');
    }

    public static function hasUpdatedProfile($userId)
    {
        // Lakukan pengecekan profil di sini, dan kembalikan true atau false sesuai hasilnya
        // Contoh:
        $user = User::find($userId);
        return !empty($user->telephone) && !empty($user->alamat);
    }

    public function deletePicture() {
        $user = Auth::user();

        // Hapus foto profil saat ini jika ada
        if ($user->profile_picture) {
            Storage::delete('public/profile_pictures/' . $user->profile_picture);
            $user->profile_picture = null;
            $user->save();
        }
        
        return redirect()->back()->with('success', 'Foto profil berhasil dihapus');
    }

}
