<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        User::create([
            'name' => 'Admin Kuliner',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Pemilik Cafe',
            'email' => 'pemilik@example.com',
            'password' => Hash::make('123456'),
            'role' => 'pemilik',
        ]);

        User::create([
            'name' => 'Pemilik Warung',
            'email' => 'warung@example.com',
            'password' => Hash::make('123456'),
            'role' => 'pemilik',
        ]);

        User::create([
            'name' => 'Pemilik Resto',
            'email' => 'resto@example.com',
            'password' => Hash::make('123456'),
            'role' => 'pemilik',
        ]);

        User::create([
            'name' => 'Pemilik Kedai',
            'email' => 'kedai@example.com',
            'password' => Hash::make('123456'),
            'role' => 'pemilik',
        ]);

        User::create([
            'name' => 'Pemilik Angkringan',
            'email' => 'angkringan@example.com',
            'password' => Hash::make('123456'),
            'role' => 'pemilik',
        ]);
    }
}
