<?php

use Illuminate\Support\Facades\Route;

// Default routing
Route::get('/', function () {
   return view('welcome');
});

// Route untuk form submission (POST)
Route::post('submit', function () {
   return 'Form submitted!!';
});

// Route untuk update data (PUT)
Route::put('update/{id}', function ($id) {
   return 'Update data for ID: ' . $id;
});

// Route untuk delete data (DELETE)
Route::delete('delete/{id}', function ($id) {
   return 'Delete data for ID: ' . $id;
});

// Menggunakan Blade Template untuk Profile
Route::get('/profile', function () {
   return view('profile'); // Menampilkan profile.blade.php
});

// Menampilkan halaman khusus mahasiswa TI
Route::get('mahasiswa/ti/latifa', function () {
   return view('mahasiswa.latifa'); // Pindah ke file Blade Template
});

// Route dengan parameter
Route::get('mahasiswa/{nama}', function ($nama) {
   return '<p> Nama mahasiswa RPL : <b>' . $nama . '</b></p>';
});

// Route untuk menghitung usia
Route::get('hitungusia/{nama}/{tahunlahir}', function ($nama, $tahun_lahir) {
   $usia = date('Y') - $tahun_lahir;
   return "<p>Hai <b>" . $nama . "</b><br> Usia Anda sekarang adalah <b>" . $usia . "</b> tahun.</p>";
});

// Route dengan parameter opsional
Route::get('mahasiswa/{nama?}', function ($nama = 'tidak ada') {
   return '<p> Nama mahasiswa RPL : <b>' . $nama . '</b></p>';
});

Route::get('hitungusia/{nama?}/{tahunlahir?}', function ($nama = "tidak ada", $tahun_lahir = "2025") {
   $usia = date('Y') - $tahun_lahir;
   return "<p>Hai <b>" . $nama . "</b><br> Usia Anda sekarang adalah <b>" . $usia . "</b> tahun.</p>";
});

// Route dengan regular expression
Route::get('user/{id}', function ($id) {
   return '<p> User admin memiliki ID <b>' . $id . '</b></p>';
})->where('id', '[0-9]+');

// Route redirect
Route::redirect('public', 'mahasiswa');

// Route group untuk login
Route::prefix('login')->group(function () {
   Route::get('mahasiswa', function () {
       return '<h2>Login sebagai mahasiswa</h2>';
   });
   Route::get('dosen', function () {
       return '<h2>Login sebagai dosen</h2>';
   });
   Route::get('admin', function () {
       return '<h2>Login sebagai admin</h2>';
   });
});

// Route fallback
Route::fallback(function () {
   return "<h2>Mohon maaf, halaman yang Anda cari <b>tidak ditemukan</b></h2>";
});
