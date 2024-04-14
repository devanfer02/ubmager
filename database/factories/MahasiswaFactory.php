<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nama = fake()->name();

        return [
            'nim' => fake()->randomNumber(8, true) . fake()->randomNumber(8, true),
            'nama_lengkap' => $nama,
            'nama_panggilan' => explode(" ", $nama)[0],
            'nomor_wa' => fake()->phoneNumber(),
            'fakultas' => 'Ilmu Komputer',
            'program_studi' => 'Teknik Informatika',
            'foto_profil' => ''
        ];
    }
}
