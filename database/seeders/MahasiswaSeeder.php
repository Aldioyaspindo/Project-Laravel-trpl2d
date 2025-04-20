<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // tanpa faker
        // \App\Models\Mahasiswa::create([
        //     'name'    => 'aldio',
        //     'nobp'    => '1234569810',
        //     'jurusan' => 'teknologi informasi',
        //     'prodi'   => 'animasi',
        //     'tglahir' => '2004-07-16',
        //     'email'   => 'yaspindo112@gmail.com',
        //     'nohp'    => '12092132'
        // ]);

        // menggunakan faker
        Mahasiswa::factory(30)->create();
    }
}
