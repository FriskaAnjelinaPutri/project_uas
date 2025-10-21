<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ulasan;
use Carbon\Carbon;

class UlasanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'tempat_makan_id' => 1,
                'nama_pengulas' => 'Rina Andriani',
                'rating' => 5,
                'komentar' => 'Tempatnya nyaman dan makanannya enak banget!',
                'tanggal_ulasan' => Carbon::parse('2025-06-01'),
            ],
            [
                'tempat_makan_id' => 2,
                'nama_pengulas' => 'Andi Wijaya',
                'rating' => 4,
                'komentar' => 'Harga terjangkau, porsi besar, mantap!',
                'tanggal_ulasan' => Carbon::parse('2025-06-03'),
            ],
            [
                'tempat_makan_id' => 3,
                'nama_pengulas' => 'Siska Putri',
                'rating' => 3,
                'komentar' => 'Pelayanan kurang cepat, tapi rasa makanan oke.',
                'tanggal_ulasan' => Carbon::parse('2025-06-05'),
            ],
        ];

        Ulasan::insert($data);
    }
}
