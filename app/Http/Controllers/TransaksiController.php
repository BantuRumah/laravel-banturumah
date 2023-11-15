<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Mitra;
use App\Models\User;
use Carbon\Carbon;
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
        
        // Retrieve the selected mitra
        $mitra = Mitra::find($request->mitra_id);
    
        if (!$mitra) {
            return response()->json([
                'success' => false,
                'message' => 'Mitra not found.',
            ], 404);
        }
    
        // Calculate jumlah_harga based on jenis_sewa and mitra's harga
        $jenis_sewa = $request->jenis_sewa;
        $harga = $mitra->harga;
        $jumlah_harga = 0;
    
        if ($jenis_sewa === 'harian') {
            $jumlah_harga = $harga * 1;
        } elseif ($jenis_sewa === 'mingguan') {
            $jumlah_harga = $harga * 7;
        } elseif ($jenis_sewa === 'bulanan') {
            $jumlah_harga = $harga * 30;
        }
    
        // Handle file upload
        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $imageName = time() . '_' . $file->getClientOriginalExtension();
            $file->storeAs('public/bukti_pembayaran', $imageName);
    
            // Create the transaction with the calculated jumlah_harga
            $transaksi = Transaksi::create([
                'mitra_id' => $mitra->id,
                'user_id' => $user_id,
                'jenis_sewa' => $jenis_sewa,
                'tanggal_sewa' => $request->tanggal_sewa,
                'tanggal_berakhir' => $request->tanggal_berakhir,
                'tanggal_transaksi' => now()->toDateString(),
                'waktu_transaksi' => now()->toTimeString(),
                'jumlah_harga' => $jumlah_harga, // Store the calculated jumlah_harga
                'status' => 'payyed',
                'bukti_pembayaran' => $imageName,
            ]);
    
            // Check if tanggal_berakhir is past
            $tanggalSekarang = now();
            $tanggalBerakhir = Carbon::parse($request->tanggal_berakhir);
    
            if ($tanggalBerakhir->isPast()) {
                // If tanggal_berakhir has passed, change mitra's status to 'tersedia'
                $mitra->update(['status' => 'tersedia']);
    
                // Update transaction status to 'finished'
                $transaksi->update(['status' => 'finished']);
            } else {
                // If tanggal_berakhir is not past, keep the transaction status as 'payyed'
            }
    
            if ($transaksi) {
                // Update mitra's status to 'menunggu' if the transaction status is 'payyed'
                if ($transaksi->status == 'payyed') {
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