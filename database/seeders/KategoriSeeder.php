<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama_kategori' => 'Makanan Tradisional'],
            ['nama_kategori' => 'Minuman Segar'],
            ['nama_kategori' => 'Cemilan'],
            ['nama_kategori' => 'Restoran Cepat Saji'],
            ['nama_kategori' => 'Dessert'],
        ];

        Kategori::insert($data);
    }
}
