<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dosen>
 */
class DosenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'nik' => fake()->bothify('##########'),
            'email' => fake()->unique()->safeEmail(),
            'nohp' => fake()->phoneNumber(),
            'alamat' => fake()->randomElement(['Limau Manis','Pasar Baru','Siteba','Pisang','Bandar Boeat','Pasar Ambacang']),
            'keahlian' => fake()->randomElement(['Mobile Programing','Web Programing','Artificial Inteligent','Business Communication','Database'])
        ];
    }
}
