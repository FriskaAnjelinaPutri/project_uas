<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TempatMakan;

class TempatMakanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama_tempat' => 'Sate Padang Mak Datuak',
                'deskripsi' => 'Sate padang khas Minang dengan kuah kental.',
                'alamat' => 'Jl. Khatib Sulaiman No.10, Padang',
                'jam_buka' => '10:00',
                'jam_tutup' => '22:00',
                'no_telepon' => '081234567890',
                'kategori_id' => 1,
            ],
            [
                'nama_tempat' => 'Es Teh Jumbo Segar',
                'deskripsi' => 'Minuman es teh segar dengan berbagai rasa.',
                'alamat' => 'Jl. Sawahan No.45, Padang',
                'jam_buka' => '09:00',
                'jam_tutup' => '21:00',
                'no_telepon' => '081298765432',
                'kategori_id' => 2,
            ],
            [
                'nama_tempat' => 'Roti Bakar Siang Malam',
                'deskripsi' => 'Roti bakar dengan berbagai topping kekinian.',
                'alamat' => 'Jl. Bundo Kandung No.5, Padang',
                'jam_buka' => '08:00',
                'jam_tutup' => '23:00',
                'no_telepon' => '082345678912',
                'kategori_id' => 3,
            ]
        ];

        TempatMakan::insert($data);
    }
}
