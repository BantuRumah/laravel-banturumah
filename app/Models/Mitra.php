<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\models\User;

class Mitra extends Model
{
    use HasFactory;

    protected $table = 'mitra'; 

    protected $fillable = [
        'name',
        'telephone',
        'layanan',
        'status',
        'harga',
    ];

    public function users(){
        return $this-> hasMany(User::class, 'mitra_id');
    }

    // public function getStatusAttribute()
    // {
    //     // Ambil status transaksi terkait terbaru
    //     $latestTransaksi = $this->transaksi->latest()->first();

    //     if ($latestTransaksi) {
    //         // Jika ada transaksi terbaru, gunakan status transaksi terbaru
    //         return $latestTransaksi->status;
    //     } else {
    //         // Jika tidak ada transaksi, status mitra default adalah 'tersedia'
    //         return 'tersedia';
    //     }
    // }
}
