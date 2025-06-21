<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat admin
        User::create([
            'name' => 'Admin IT',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);

    }
}
