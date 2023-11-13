<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaksi')->insert([
            'jenis_sewa' => 'harian',
            'tanggal_sewa' => Carbon::today(),
            'tanggal_berakhir' => Carbon::today()->addDays(1),
            'tanggal_transaksi' => Carbon::today(),
            'waktu_transaksi' => Carbon::now()->format('H:i:s'),
            'status' => 'payyed', // Perhatikan typo 'payyed' jika ini sengaja
            'mitra_id' => 1,
            'user_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
