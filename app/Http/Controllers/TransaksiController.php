<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Mitra;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function create() {
        $userUsers = User::where('role', 'user')->get();
        return view('layouts.view.admin.layouts.users.useruser', compact('userUsers'));
    }

    public function store(Request $request) {
        $request->validate([
            'jenis_sewa' => 'required',
            'tanggal_sewa' => 'required|date',
            'bukti_pembayaran' => 'required|image|mimes:jpeg,jpg,png',
            'mitra_id' => 'required|exists:mitra,id',
            'user_id' => 'required|exists:users,id',
        ]);
    
        $user_id = Auth::id();
        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $imageName = time() . '_' . $file->getClientOriginalExtension();
            $file -> storeAs('public/bukti_pembayaran', $imageName);
    
            // Create the transaction with the path of the stored image
            $transaksi = Transaksi::create([
                'mitra_id' => $request->mitra_id,
                'user_id' => $user_id,
                'jenis_sewa' => $request->jenis_sewa,
                'tanggal_sewa' => $request->tanggal_sewa,
                'tanggal_berakhir' => $request->tanggal_berakhir,
                'tanggal_transaksi' => now()->toDateString(),
                'waktu_transaksi' => now()->toTimeString(),
                'status' => 'payyed',
                'bukti_pembayaran' => $imageName, // Store the path of the image
            ]);
    
            if ($transaksi) {
                $mitra = Mitra::find($request->mitra_id);
                if ($mitra && $transaksi->status == 'payyed') {
                    $mitra->update(['status' => 'menunggu']);
                }
                return response()->json([
                    'success' => true,
                    'message' => 'Transaksi Anda telah berhasil tersimpan.',
                    'transaksi' => $transaksi
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'There was an error saving the transaction.'
                ], 500);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Bukti pembayaran is required.'
            ], 422);
        }
    }    
}
