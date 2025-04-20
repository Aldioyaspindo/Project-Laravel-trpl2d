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
        return [
            'name'    => fake()->name(),
            'nobp'    => fake()->bothify( '##########'),
            'jurusan' => fake()->randomElement(['TI','Electro','AN','BING','Sipil']),
            'prodi'   => fake()->randomElement(['ANIMASI','TRPL','MI','TK','SD','SMP']),
            'tglahir' => fake()->date('Y-m-d'),
            'email'   => fake()->unique()->safeEmail(),
            'nohp'    => fake()->phoneNumber()
        ];
    }
}
