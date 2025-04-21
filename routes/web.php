<?php

use App\Http\Controllers\Dosen\DosenpnpController;
use App\Http\Controllers\mahasiswa\MahasiswapnpController;
use App\Http\Controllers\MahasiswaControler;
use App\Http\Controllers\TeknisiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dosen\DosenController;
use App\Http\Controllers\Dosen\DosentiController;

// // Default routing
Route::get('/', function () {
   return redirect("/mahasiswa");
});

// // Route untuk form submission (POST)
// Route::post('submit', function () {
//    return 'Form submitted!!';
// });

// // Route untuk update data (PUT)
// Route::put('update/{id}', function ($id) {
//    return 'Update data for ID: ' . $id;
// });

// // Route untuk delete data (DELETE)
// Route::delete('delete/{id}', function ($id) {
//    return 'Delete data for ID: ' . $id;
// });

// // Menggunakan Blade Template untuk Profile
// Route::get('/profile', function () {
//    return view('profile'); // Menampilkan profile.blade.php
// });

// Menampilkan halaman khusus mahasiswa TI
// Route::get('mahasiswa/ti/latifa', function () {
//    return view('mahasiswa.latifa'); // Pindah ke file Blade Template
// });

// Route dengan parameter
// Route::get('mahasiswa/{nama}', function ($nama) {
//    return '<p> Nama mahasiswa RPL : <b>' . $nama . '</b></p>';
// });

// // Route untuk menghitung usia
// Route::get('hitungusia/{nama}/{tahunlahir}', function ($nama, $tahun_lahir) {
//    $usia = date('Y') - $tahun_lahir;
//    return "<p>Hai <b>" . $nama . "</b><br> Usia Anda sekarang adalah <b>" . $usia . "</b> tahun.</p>";
// });

// // Route dengan parameter opsional
// Route::get('mahasiswa/{nama?}', function ($nama = 'tidak ada') {
//    return '<p> Nama mahasiswa RPL : <b>' . $nama . '</b></p>';
// });


   //    Route::get('hitungusia/{nama?}/{tahunlahir?}', function ($nama = "tidak ada", $tahun_lahir = "2025") {
   //       $usia = date('Y') - $tahun_lahir;
   //       return "<p>Hai <b>" . $nama . "</b><br> Usia Anda sekarang adalah <b>" . $usia . "</b> tahun.</p>";
   //    });

   //    // Route dengan regular expression
   //    Route::get('user/{id}', function ($id) {
   //       return '<p> User admin memiliki ID <b>' . $id . '</b></p>';
   //    })->where('id', '[0-9]+');

   //    // Route redirect
   //    Route::redirect('public', 'mahasiswa');

   //    // Route group untuk login
   //    Route::prefix('login')->group(function () {
   //       Route::get('mahasiswa', function () {
   //        return '<h2>Login sebagai mahasiswa</h2>';
   //    });
   //    Route::get('dosen', function () {
   //        return '<h2>Login sebagai dosen</h2>';
   //    });
   //    Route::get('admin', function () {
   //        return '<h2>Login sebagai admin</h2>';
   //    });
   // });

   // // Route fallback
   // Route::fallback(function () {
   //    return "<h2>Mohon maaf, halaman yang Anda cari <b>tidak ditemukan</b></h2>";
   // });


// Route::get('/mahasiswa',[MahasiswaControler::class,'index']);

Route::get( '/listmahasiswa',function() {
$arrmhs=[
   'aldio',
   'yaspindo',
   'jokowi',
   'prabowo'
];
return view('akademik.mahasiswa',['mhs'=>$arrmhs]);
});

Route::view('/hello', 'hello',['nama'=>'ALDIOO']);

// tgl 07 maret
Route::get("/mahasiswalist",function(){
   $mhs1 = "aldio";
   $mhs2 = "yaspindo";
   $mhs3 = "muhamad";

   return view("akademik.mahasiswalist", compact("mhs1",
   "mhs2",
   "mhs3"
   ));
});

Route::get("/mahasiswanilai",function(){
   $nama = "aldio";
   $nim = "2311081025";
   $total_nilai = 90;

   return view("akademik.nilaimahasiswa", compact("nama",
   "nim",
   "total_nilai"
   ));
});

Route::get("/mahasiswanilaiswitch",function(){
   $nama = "aldio";
   $nim = "2311081025";
   $total_nilai = 90;

   return view("akademik.nilaimahasiswaswitch", compact("nama",
   "nim",
   "total_nilai"
   ));
});

Route::get("/mahasiswanilaiforloop",function(){
   $nama = "aldio";
   $nim = "2311081025";
   $total_nilai = 90;

   return view("akademik.nilaimahasiswaforloop", compact("nama",
   "nim",
   "total_nilai"
   ));
});

Route::get("/mahasiswanilaidowhile",function(){
   $nama = "aldio";
   $nim = "2311081025";
   $total_nilai = 1;

   return view("akademik.nilaimahasiswadowhile", compact("nama",
   "nim",
   "total_nilai"
   ));
});

Route::get("/mahasiswanilaiforeach",function(){
   $nama = "aldio";
   $nim = "2311081025";
   $total_nilai = [20,30,40,50];

   return view("akademik.nilaimahasiswaforeach", compact("nama",
   "nim",
   "total_nilai"
   ));
});

Route::get("/mahasiswanilaiforelse",function(){
   $nama = "aldio";
   $nim = "2311081025";
   $total_nilai = [20,30,40,50];

   return view("akademik.nilaimahasiswaforelse", compact("nama",
   "nim",
   "total_nilai"
   ));
});

Route::get("/mahasiswanilaicontinuebreak",function(){
   $nama = "aldio";
   $nim = "2311081025";
   $total_nilai = [20,30,40,50];

   return view("akademik.nilaimahasiswacontinuebreak", compact("nama",
   "nim",
   "total_nilai"
   ));
});


Route::get("/mahasiswanilaicontinuebreak2",function(){
   $nama = "aldio";
   $nim = "2311081025";
   $total_nilai = [100,90,80,70,60,50,40,30,20,10];

   return view("akademik.nilaimahasiswacontinuebreak2", compact("nama",
   "nim",
   "total_nilai"
   ));
});
/////////////////////////////////////////////////////////////////////////////////
//10 maret 2025 ////////////////////////////////////////////////////////////////
// Route::get("/mahasiswaTi",function(){
//    $arrMhs = [
//       'aldio',
//       'yaspindo',
//       'anjay',
//       'navar'
//    ];
//    return view("akademikTi.mahasiswaPnp", ['mhs' =>$arrMhs]);
// });

Route::get("/dosenTi",function(){
   $arrDsn = [
      'Dosen Web Framework',
      'Dosen Microservices',
      'Dosen Mobile Programing',
      'Dosen Web Programing',
      'Dosen IOt'
   ];
   return view("akademikTi.dosenPnp",['dsn' =>$arrDsn]);
});

   Route::get("/pnp/{jurusan}/{prodi}",function($jurusan,$prodi){
      $data=[$jurusan,$prodi];
      return view("akademikTi.prodiPnp")->with('data',$data);
   })->name('prodi');

   /////////////////////////////////
   Route::get('Dosenct',[\App\Http\Controllers\DosenController::class,'index']);

   Route::get('Teknisi/create',[TeknisiController::class,'create']);

   Route::post('Teknisi/create',[TeknisiController::class,'store']);

   Route::get('Teknisi/{id}',[TeknisiController::class,'show']);

   Route::get('Teknisi/{id}/edit',[TeknisiController::class,'edit']);

   Route::put('Teknisi/{id}',[TeknisiController::class,'update']);

   // Route::delete('Teknisi/{id}',[DosenController::class,'destroy']);

   Route::get('insert-sql',[MahasiswaControler::class,'insertSql']);
   Route::get('insert-prepared',[MahasiswaControler::class,'insertPrepared']);
   Route::get('insert-binding', [MahasiswaControler::class, 'insertBinding']);
   Route::get('update',[MahasiswaControler::class,'update']);
   Route::get('delete',[MahasiswaControler::class,'delete']);
   Route::get('select',[MahasiswaControler::class,'select']);
   Route::get('select-view',[MahasiswaControler::class,'selectView']);
   Route::get('select-where',[MahasiswaControler::class,'selectWhere']);
   Route::get('statement',[MahasiswaControler::class,'statement']);

   // Dosen Table CRUD query bukder
   Route::get('dosen',[DosenpnpController::class, 'index'])->name('dosens.index');
   Route::get('dosen/create',[DosenpnpController::class, 'create'])->name('dosens.create');
   Route::post('dosen',[DosenpnpController::class, 'store'])->name('dosens.store');
   Route::get('dosen/{id}/edit',[DosenpnpController::class, 'edit'])->name('dosens.edit');
   Route::put('dosen/{id}', [DosenpnpController::class, 'update'])->name('dosens.update');
   Route::delete('dosen/{id}',[DosenpnpController::class, 'destroy'])->name('dosens.destroy');
   // Dosen Table CRUD Eloquent ORM
   Route::get('dosenti',[DosentiController::class, 'index'])->name('dosensti.index');
   Route::get('dosenti/create',[DosentiController::class, 'create'])->name('dosensti.create');
   Route::post('dosenti',[DosentiController::class, 'store'])->name('dosensti.store');
   Route::get('dosenti/{id}/edit',[DosentiController::class, 'edit'])->name('dosensti.edit');
   Route::put('dosenti/{id}', [DosentiController::class, 'update'])->name('dosensti.update');
   Route::delete('dosenti/{id}',[DosentiController::class, 'destroy'])->name('dosensti.destroy');

   // Mahasiswa Table CRUD
   Route::get('mahasiswa', [MahasiswapnpController::class, 'index'])->name('mahasiswas.index');
   Route::get('mahasiswa/create', [MahasiswapnpController::class, 'create'])->name('mahasiswas.create');
   Route::post('mahasiswa', [MahasiswapnpController::class, 'store'])->name('mahasiswas.store');
   Route::get('mahasiswa/{id}/edit', [MahasiswapnpController::class, 'edit'])->name('mahasiswas.edit');
   Route::put('mahasiswa/{id}', [MahasiswapnpController::class, 'update'])->name('mahasiswas.update');
   Route::delete('mahasiswa/{id}', [MahasiswapnpController::class, 'destroy'])->name('mahasiswas.destroy');

   

Route::get('cek-objek',
[DosenController::class,'cekObjek']);
Route::get('insert',[DosenController::class,'insert']);
Route::get('mass-assignment',[DosenController::class,'massAssignment']);
Route::get('updatedosen',[DosenController::class,'update']);
Route::get('updatedosen-where',[DosenController::class,'updateWhere']);
Route::get('mass-update',[DosenController::class,'massUpdate']);
Route::get('deletedosen',[DosenController::class,'delete']);
Route::get('destroydosen',[DosenController::class,'destroy']);
Route::get('mass-delete',[DosenController::class,'massDelete']);
Route::get('all',[DosenController::class,'all']);
Route::get('all-view',[DosenController::class,'allView']);
Route::get('get-where',[DosenController::class,'getWhere']);
Route::get('test-where',[DosenController::class,'testWhere']);
Route::get('first',[DosenController::class,'first']);
Route::get('find',[DosenController::class,'find']);
Route::get('latest',[DosenController::class,'latest']);
Route::get('limit',[DosenController::class,'limit']);
Route::get('skip-take',[DosenController::class,'skipTake']);
Route::get('soft-delete',[DosenController::class,'softDelete']);
Route::get('with-trashed',[DosenController::class,'withTrashed']);
Route::get('restore',[DosenController::class,'restore']);
Route::get('force-delete',[DosenController::class,'forceDelete']);
