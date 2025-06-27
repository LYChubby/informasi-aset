<?php

namespace Database\Factories;

use App\Models\AssetReport;
use App\Models\User;
use App\Models\Asset;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssetReportFactory extends Factory
{
    protected $model = AssetReport::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->randomElement(['perbaikan', 'penambahan', 'kerusakan']),
            'laporan' => $this->faker->sentence,
            'nama_aset' => $this->faker->word,
            'kategori' => $this->faker->word,
            'lokasi' => $this->faker->city,
            'aset_id' => Asset::factory(),
            'status' => 'belum_ditanggapi',
        ];
    }
}
