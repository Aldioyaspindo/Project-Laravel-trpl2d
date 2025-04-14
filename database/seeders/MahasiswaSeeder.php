<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Mahasiswa::create([
            'name'    => 'aldio',
            'nobp'    => '1234569810',
            'jurusan' => 'teknologi informasi',
            'prodi'   => 'animasi',
            'tglahir' => '2004-07-16',
            'email'   => 'yaspindo112@gmail.com',
            'nohp'    => '12092132'
        ]);
    }
}
