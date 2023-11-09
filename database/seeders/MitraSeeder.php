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
                'telephone' => '1234567890',
                'layanan' => 'Asisten Rumah Tangga',
                'status' => 'tersedia',
                'harga' => 1000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
