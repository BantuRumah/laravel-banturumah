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
        // $adminRole = Role::where('role', 'admin')->first();
        // $mitraRole = Role::where('role', 'mitra')->first();
        // $userRole = Role::where('role', 'user')->first();
        // User::create([
        //     'name' => 'Admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('password'),
        //     'role' => $adminRole->id,
        // ]);

        // User::create([
        //     'name' => 'Mitra',
        //     'email' => 'mitra@gmail.com',
        //     'password' => Hash::make('password'),
        //     'role' => $mitraRole->id,
        // ]);

        // User::create([
        //     'name' => 'User',
        //     'email' => 'user@gmail.com',
        //     'password' => Hash::make('password'),
        //     'role' => $userRole->id,
        // ]);
        $userData = [
            [
                'name' => 'Admin BantuRumah',
                'email' => 'banturumah4@gmail.com',
                'password' => Hash::make('Password121'),
                'role' => 'admin',
            ],
            [
                'name' => 'Mitra BantuRumah',
                'email' => 'mitra@gmail.com',
                'password' => Hash::make('Password121'),
                'role' => 'mitra',
            ],
            [
                'name' => 'User BantuRumah',
                'email' => 'user@gmail.com',
                'password' => Hash::make('Password121'),
                'role' => 'user',
            ],
        ];

        foreach($userData as $key => $value) {
            User::create($value);
        }
    }
}
