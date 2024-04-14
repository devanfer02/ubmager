<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\Order;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Mahasiswa::factory(10)->create();

        Order::factory(20)->create();
    }
}
