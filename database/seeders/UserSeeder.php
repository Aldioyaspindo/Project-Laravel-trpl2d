<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Admin1',
            'email'=>'admin1@gmail.com',
            'password'=>Hash::make('user123'),
            'role'=>'admin'
        ]);

        User::create([
            'name'=>'Admin2',
            'email'=>'admin2@gmail.com',
            'password'=>Hash::make('user123'),
            'role'=>'admin'
        ]);
    }
}
