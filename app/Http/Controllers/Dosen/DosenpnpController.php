<?php

namespace App\Http\Controllers\dosen;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DosenpnpController extends Controller
{
    public function index()
    {
        $dosens = DB::table('dosens')->paginate();
        return view('dosens.index', compact('dosens'));
    }

    public function create()
    {
        return view('dosens.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            'email' => 'required|email|unique:dosens,email',
            'nohp' => 'nullable|string|max:11',
            'alamat' => 'nullable|string|max:255',
            'keahlian' => 'nullable|string|max:255'
        ]);

        DB::table('dosens')->insert([
            'name' => $request->name,
            'nik' => $request->nik,
            'email' => $request->email,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
            'keahlian' => $request->keahlian,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('dosens.index')->with('success', 'Data dosen berhasil ditambahkan');
    }

    public function show(string $id)
    {
        return view('dosens.create');    
    }

    public function edit(string $id)
    {
        $dosen = DB::table('dosens')->where('id', $id)->first();
        return view('dosens.edit', compact('dosen')); 
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nik' => 'required|numeric|unique:dosens,nik,'.$id,
            'email' => 'required|email|unique:dosens,email,'.$id,
            'nohp' => 'nullable|string|max:12',
            'alamat' => 'nullable|string|max:255',
            'keahlian' => 'nullable|string|max:255'
        ]);

        DB::table('dosens')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'nik' => $request->nik,
                'email' => $request->email,
                'nohp' => $request->nohp,
                'alamat' => $request->alamat,
                'keahlian' => $request->keahlian,
                'updated_at' => now()
            ]);

        return redirect()->route('dosens.index')->with('success', 'Data dosen berhasil diupdate');
    }

    public function destroy(string $id)
    {
        DB::table('dosens')->where('id', $id)->delete();
        return redirect()->route('dosens.index')->with('success', 'Data dosen berhasil dihapus');
    }
}
