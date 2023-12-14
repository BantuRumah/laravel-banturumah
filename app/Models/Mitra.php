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
        'layanan',
        'umur',
        'radius',
        'pekerjaan',
        'mobilitas',
        'status',
        'harga',
    ];

    public function users(){
        return $this-> hasMany(User::class, 'mitra_id');
    }
}
