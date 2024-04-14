<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Mahasiswa;
use Ramsey\Uuid\Uuid;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $locations = [
        'Suhat',
        'Sigura-gura',
        'Kerto',
        'Tunggulagung',
        'Panjaitan',
        'Griya',
        'Veteran'
    ];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $extFks = Mahasiswa::pluck('nim');

        return [
            'order_id' => Uuid::uuid4(),
            'customer_id' => fake()->randomElement($extFks),
            'judul' => fake()->sentence(3),
            'lokasi_jemput' => fake()->randomElement($this->locations),
            'destinasi' => fake()->randomElement($this->locations),
            'upah' => fake()->numberBetween(10000, 500000),
            'detail' => fake()->paragraph(mt_rand(2, 4)),
            'selesai' => fake()->numberBetween(0,1)
        ];
    }
}
