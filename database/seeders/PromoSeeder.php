<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Promo;
use Carbon\Carbon;

class PromoSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'judul_promo' => 'Diskon Akhir Pekan',
                'deskripsi_promo' => 'Nikmati diskon 20% khusus akhir pekan!',
                'mulai_promo' => Carbon::parse('2025-06-14'),
                'akhir_promo' => Carbon::parse('2025-06-16'),
                'tempat_makan_id' => 1,
            ],
            [
                'judul_promo' => 'Promo Pelajar',
                'deskripsi_promo' => 'Diskon 15% untuk pelajar dengan kartu pelajar.',
                'mulai_promo' => Carbon::parse('2025-06-10'),
                'akhir_promo' => Carbon::parse('2025-07-10'),
                'tempat_makan_id' => 2,
            ],
            [
                'judul_promo' => 'Gratis Dessert',
                'deskripsi_promo' => 'Dapatkan dessert gratis untuk pembelian di atas 50rb!',
                'mulai_promo' => Carbon::parse('2025-06-12'),
                'akhir_promo' => Carbon::parse('2025-06-30'),
                'tempat_makan_id' => 3,
            ],
        ];

        Promo::insert($data);
    }
}
