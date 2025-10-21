<?php

namespace Database\Factories;

use App\Models\Promo;
use App\Models\TempatMakan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PromoFactory extends Factory
{
    protected $model = Promo::class;

    public function definition(): array
    {
        return [
            'judul_promo' => $this->faker->sentence,
            'deskripsi_promo' => $this->faker->paragraph,
            'mulai_promo' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'akhir_promo' => $this->faker->dateTimeBetween('now', '+1 month'),
            'tempat_makan_id' => TempatMakan::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id, 
        ];
    }
}
