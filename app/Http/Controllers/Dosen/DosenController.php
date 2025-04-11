<?php

namespace App\Http\Controllers\Dosen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = DB::table('dosen')->get();
        return view('dosens/index',compact('dosens'));
    }

    public function create()
    {
        
        return view('dosens.create');

    }

    public function store(Request $request)
    {
        
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'nohp' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'keahlian' => 'required|string|max:255',
        ]);

        DB::table('dosens')->where('id', $id)->([
        
            'nama' => $$request->nama,
            'nik' =>$request->nik,
            'email' =>$request->email,
            'nohp' =>$request->nohp,
            'alamat' =>$request->alamat,
            'keahlian' =>$request->keahlian,
            'created_at' =>$request->now(),
            'upadted_at' =>$request->now()
        ]);

        redirect()->route('dosens.index');
        
    }
}
