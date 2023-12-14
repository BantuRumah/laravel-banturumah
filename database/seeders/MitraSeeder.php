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
                'name' => 'Nengah Yastrini',
                'layanan' => 'Asisten Rumah Tangga',
                'umur' => '32',
                'radius' => 'Pandaan',
                'pekerjaan' => "1. Menyapu \n2. Mengepel \n3. Menjaga Rumah \n4. Cuci Baju \n5. Mengelap",
                'mobilitas' => 'Pulang Pergi',
                'status' => 'tersedia',
                'harga' => 38500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ainur Rohman',
                'layanan' => 'Driver',
                'umur' => '35',
                'radius' => 'Jawa Timur',
                'pekerjaan' => "Mengantar kedalam kota maupun luar kota",
                'mobilitas' => 'Pulang Pergi',
                'status' => 'tersedia',
                'harga' => 125000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
