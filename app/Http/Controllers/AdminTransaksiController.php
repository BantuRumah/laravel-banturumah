<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class AdminTransaksiController extends Controller
{
    public function index() {
        $transaksis = Transaksi::with(['mitra', 'users'])->get();
        // dd($transaksis);
        return view('layouts.view.admin.layouts.transaksi.transaksi' ,compact('transaksis'));
    }
    public function riwayattransaksi() {
        // Dapatkan ID pengguna yang sedang login
    $userId = Auth::id();

    // Filter transaksi berdasarkan ID pengguna yang sedang login
    // Asumsi bahwa di model Transaksi ada relasi 'users' yang menghubungkan ke tabel pengguna
    $transaksis = Transaksi::with(['mitra', 'users'])->whereHas('users', function($query) use ($userId) {
        $query->where('id', $userId);
    })->get();

    // dd($transaksis); // Debug untuk melihat hasil query
    return view('layouts.view.admin.layouts.transaksi.riwayattransaksi', compact('transaksis'));
    }
    public function update_status(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required|in:payyed,success,failed',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update(['status' => $validatedData['status']]);

        return redirect()->route('admin.transaksi')->with('success', 'Transaction status updated successfully');
    }
    public function destroy($id) {
        // Find the transaction by ID
        $transaksi = Transaksi::findOrFail($id);

        // Delete the transaction
        $transaksi->delete();

        // Redirect back to the transactions list with a success message
        return redirect()->route('admin.transaksi')->with('success', 'Transaction deleted successfully');
    }
}
