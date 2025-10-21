<?php

namespace Database\Factories;

use App\Models\TempatMakan;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

class TempatMakanFactory extends Factory
{
    protected $model = TempatMakan::class;

    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'kategori_id' => Kategori::inRandomOrder()->first()->id, 
            'nama_tempat' => $this->faker->company,
            'deskripsi' => $this->faker->paragraph,
            'alamat' => $this->faker->address,
            'jam_buka' => '08:00',
            'jam_tutup' => '22:00',
            'no_telepon' => $this->faker->phoneNumber,
        ];
    }
}
