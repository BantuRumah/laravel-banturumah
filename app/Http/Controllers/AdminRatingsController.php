<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class AdminRatingsController extends Controller
{
    public function index() {
        // Ambil data transaksi yang memiliki ratings terkait
        $transaksis = Transaksi::with(['mitra', 'users', 'ratings'])->whereHas('ratings')->get();

        return view('layouts.view.admin.layouts.ratings.ratings', compact('transaksis'));
    }

    public function destroy($id) {
        // Temukan rating berdasarkan ID
        $rating = Rating::findOrFail($id);

        // Hapus rating
        $rating->delete();

        // Redirect kembali ke halaman ratings dengan pesan sukses
        return redirect()->route('admin.ratings')->with('success', 'Rating deleted successfully');
    }
}
