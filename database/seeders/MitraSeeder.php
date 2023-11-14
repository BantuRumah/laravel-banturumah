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
                'status' => 'tersedia',
                'harga' => 35000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
