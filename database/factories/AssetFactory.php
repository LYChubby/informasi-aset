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
            'nama' => $this->faker->word(),
            'kategori' => 'Elektronik',
            'lokasi' => 'Ruang A',
            'status' => 'aktif',
            'tanggal_pembelian' => now(),
            'nilai' => 1000000,
            'deskripsi' => 'Aset untuk keperluan operasional',
        ];
    }
}
