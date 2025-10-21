<?php

namespace Database\Factories;

use App\Models\Ulasan;
use App\Models\TempatMakan;
use Illuminate\Database\Eloquent\Factories\Factory;

class UlasanFactory extends Factory
{
    protected $model = Ulasan::class;

    public function definition(): array
    {
        return [
            'tempat_makan_id' => TempatMakan::inRandomOrder()->first()?->id ?? 1, // Pastikan nilainya ada
            'nama_pengulas' => $this->faker->name,
            'rating' => $this->faker->numberBetween(1, 5),
            'komentar' => $this->faker->sentence(10),
            'tanggal_ulasan' => $this->faker->date(),
        ];
    }
}
