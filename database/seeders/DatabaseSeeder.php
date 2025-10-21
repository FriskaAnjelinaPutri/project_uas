<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kategori;
use App\Models\TempatMakan;
use App\Models\Promo;
use App\Models\Ulasan;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin Kuliner',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345'),
            'role' => 'admin',
        ]);

        $pemilik1 = User::create([
            'name' => 'Pemilik Cafe A',
            'email' => 'pemilik1@example.com',
            'password' => Hash::make('12345'),
            'role' => 'pemilik',
        ]);

        $pemilik2 = User::create([
            'name' => 'Pemilik Cafe B',
            'email' => 'pemilik2@example.com',
            'password' => Hash::make('12345'),
            'role' => 'pemilik',
        ]);

        $pemilik3 = User::create([
            'name' => 'Pemilik Cafe C',
            'email' => 'pemilik3@example.com',
            'password' => Hash::make('12345'),
            'role' => 'pemilik',
        ]);

        $pemilik4 = User::create([
            'name' => 'Pemilik Cafe D',
            'email' => 'pemilik4@example.com',
            'password' => Hash::make('12345'),
            'role' => 'pemilik',
        ]);

        // kategori
        Kategori::factory()->count(5)->create();

        $userIds = User::where('role', 'pemilik')->pluck('id')->toArray();
        $kategoriIds = Kategori::pluck('id')->toArray();

        // Tempat Makan
        TempatMakan::factory()->count(10)->create()->each(function ($tempat) use ($userIds, $kategoriIds) {
            $tempat->update([
                'user_id' => fake()->randomElement($userIds),
                'kategori_id' => fake()->randomElement($kategoriIds),
            ]);
        });

        $tempatMakanIds = TempatMakan::pluck('id')->toArray();

        // Promo
        Promo::factory()->count(10)->create()->each(function ($promo) use ($tempatMakanIds) {
            $promo->update([
                'tempat_makan_id' => fake()->randomElement($tempatMakanIds),
            ]);
        });

        // Ulasan
        Ulasan::factory()->count(10)->create()->each(function ($ulasan) use ($tempatMakanIds) {
            $ulasan->update([
                'tempat_makan_id' => fake()->randomElement($tempatMakanIds),
            ]);
        });
    }
}
