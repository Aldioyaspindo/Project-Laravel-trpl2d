<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaControler extends Controller
{
    public function insertSql(){
        $query = DB::insert(
            'INSERT INTO mahasiswas (name, nobp, jurusan, prodi, tglahir, email, nohp, created_at, updated_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW())', 
            ['Aldio', '1025', 'Teknologi Informasi', 'TRPL', '2004-07-16', 'aldio@gmail.com', '085183200450']
        );
        
        return "berhasil insert mahasiswa";
    }


    public function insertPrepared(){
        $query = DB::insert(
            'INSERT INTO mahasiswas (name, nobp, jurusan, prodi, tglahir, email, nohp, created_at, updated_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW())', 
            ['yaspindo', '1009', 'Teknologi Informasi', 'MI', '2005-02-12', 'yaspindo@gmail.com', '085183200452']
        );
        
        return "berhasil insert prepared mahasiswa";
    }

    
    public function insertBinding()
    {
        $query = DB::insert(
            'INSERT INTO mahasiswas (name, nobp, jurusan, prodi, tglahir, email, nohp, created_at, updated_at) 
            VALUES (:name, :nobp, :jurusan, :prodi, :tglahir, :email, :nohp, :created_at, :updated_at)', 
            [
                'name'       => 'Muhamad',
                'nobp'       => '1000',
                'jurusan'    => 'Teknologi Informasi',
                'prodi'      => 'ANIMASI',
                'tglahir'    => '2001-01-11',
                'email'      => 'maldioy@gmail.com',
                'nohp'       => '085183200453',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
    
        return "Berhasil insert binding mahasiswa";
    }

   

    public function update()
    {
        $query = DB::update(
            "UPDATE mahasiswas SET jurusan = 'KESEHATAN MASYARAKAT' where name=?",['Aldio']);
            return "Berhasil UPDATE mahasiswa";
    }

    public function select()
    {
        $query = DB::select(
            "SELECT * FROM mahasiswas WHERE name=?",['Aldio']);
            return "Berhasil SELECT mahasiswa";
    }

    public function selectView()
    {
        $query = DB::lates()->paginate(10);
            return view("akademik.mahasiswapnp",["mhs"=>$query]);
    }

    public function selectwhere()
    {
        $query = DB::select(
            "SELECT * FROM mahasiswas WHERE prodi=? ORDER BY nobp ASC",['Aldio']);
            return view("akademik.mahasiswapnp",["mhs"=>$query]);
    }

    public function statement(){
        $query = DB::delete("TRUNCATE mahasiswas");
        return "berhasil menghapus table mahasiswa";
    }




    


    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        DB::Listen(function($query){
            logger("Query: ". $query->sql." |binding" .implode(", ", $query->bindings));
        });

        // mengambil data mahasiswa
        $data = Mahasiswa::all();
        // dd($data);

        dump($data);
        return view("mahasiswa.index",compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
