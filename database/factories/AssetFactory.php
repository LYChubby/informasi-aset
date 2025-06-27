<?php

namespace Database\Factories;

use App\Models\Asset;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssetFactory extends Factory
{
    protected $model = Asset::class;

    public function definition(): array
    {
        return [
            'nama' => $this->faker->word,
            'kategori' => $this->faker->word,
            'lokasi' => $this->faker->city,
            'status' => 'aktif',
            'tanggal_pembelian' => now()->subDays(rand(1, 365))->format('Y-m-d'),
            'nilai' => $this->faker->numberBetween(1000000, 10000000), 
        ];
    }
}
