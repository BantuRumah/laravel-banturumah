<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     public function run()
     {
         $userData = [
            [
                'name' => 'Admin BantuRumah',
                'email' => 'banturumah4@gmail.com',
                'password' => Hash::make('Password121'),
                'role' => 'admin',
                'telephone' => '082313568127',
                'alamat' => 'Jl. Soekarno Hatta No.9, Jatimulyo, Kec.Lowokwaru, Kota Malang, Jawa Timur 65141',
                'mitra_id' => null,
            ],
             [
                 'name' => 'Mitra BantuRumah',
                 'email' => 'mitra@gmail.com',
                 'password' => Hash::make('Password121'),
                 'role' => 'mitra',
                 'telephone' => '085159094233',
                 'alamat' => 'Jl. Soekarno Hatta No.9, Jatimulyo, Kec.Lowokwaru, Kota Malang, Jawa Timur 65141',
                 'mitra_id' => 1,
             ],
             [
                 'name' => 'User BantuRumah',
                 'email' => 'user@gmail.com',
                 'password' => Hash::make('Password121'),
                 'role' => 'user',
                 'mitra_id' => null,
             ],
         ];
     
         foreach ($userData as $data) {
             $user = User::create([
                 'name' => $data['name'],
                 'email' => $data['email'],
                 'password' => $data['password'],
                 'role' => $data['role'],
                 'telephone' => isset($data['telephone']) ? $data['telephone'] : null,
                 'alamat' => isset($data['alamat']) ? $data['alamat'] : null,
                 'mitra_id' => $data['mitra_id'],
                //  'role' => Role::where('role', $data['role'])->first()->id,
             ]);
         }
     }
}
