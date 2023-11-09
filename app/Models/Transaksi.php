<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mitra;
use App\Models\User;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $fillable = [
        'mitra_id', 
        'user_id', 
        'jenis_sewa', 
        'tanggal_sewa',
        'tanggal_berakhir',
        'tanggal_transaksi',
        'waktu_transaksi', 
        'status', 
        'bukti_pembayaran'];

    public function mitra() {
        return $this->belongsTo(Mitra::class, 'mitra_id');
    }
    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
