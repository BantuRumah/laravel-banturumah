<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MitraController extends Controller
{
    public function index() {
        // echo "halo mitra ".Auth::user()->name;
        // echo "<a href='/logout'>logout</a>";
        return view('layouts.homepage.home');
    }

    public function mitraUsers() {
        $mitraUsers = User::where('role', 'mitra')->get();
        return view('layouts.view.admin.layouts.users.usermitra', compact('mitraUsers'));
    }    

    public function keteranganMitra() {
        $mitra = Mitra::all();  
        return view('layouts.view.admin.layouts.users.keteranganmitra', compact('mitra'));
    }

    public function index2(){
        $mitra = Mitra::all();
        return view('layouts.view.mitra.mitra', compact('mitra'));
    }
    public function create()
    {
        return view('layouts.view.admin.layouts.users.formuser.createketerangan');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'telephone' => 'required|numeric',
            'description' => 'nullable',
            'status' => 'required|in:tersedia,tidak tersedia',
            'harga' => 'required',
        ]);
        $data['status'] = 'tersedia';
        Mitra::create($data);
        // dd($data);
        return redirect()->route('admin.user.keterangan-mitra');
    }

    public function edit($id)
    {
        $mitra = Mitra::find($id);
        return view('mitra.edit', compact('mitra'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'profile_picture' => 'nullable',
            'name' => 'required',
            'telephone' => 'required',
            'description' => 'nullable',
            'status' => 'nullable|in:tersedia,tidak tersedia',
            'harga' => 'nullable',
        ]);
        $$mitra = Mitra::find($id);
        if ($request->hasFile('profile_picture')) {
            // Hapus gambar lama jika ada
            if ($mitra->profile_picture) {
                Storage::disk('public')->delete($mitra->profile_picture);
            }
    
            // Unggah gambar baru
            $imagePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $data['profile_picture'] = $imagePath;
        }
        $mitra->update($data);

        return redirect()->route('mitra.index');
    }

    public function destroy(Mitra $id)
    {
        $mitra = Mitra::find($id);
        $mitra->delete();

        return redirect()->route('mitra.index');
    }
}
