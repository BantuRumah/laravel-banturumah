<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mitra')->insert([
            [
                'name' => 'Mitra BantuRumah',
                'layanan' => 'Asisten Rumah Tangga',
                'umur' => '25',
                'radius' => 'Griya Shanta Malang',
                'pekerjaan' => "1. Menyapu \n2. Mengepel \n3. Menjaga Rumah \n4. Cuci Baju",
                'mobilitas' => 'Pulang Pergi',
                'status' => 'tersedia',
                'harga' => 110000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
