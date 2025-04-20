<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class MahasiswapnpController extends Controller
{
    public function index()
    {
        $mahasiswas = DB::table('mahasiswas')->paginate(10);
        return view('mahasiswas.index', compact('mahasiswas'));
    }

    public function create()
    {
        return view('mahasiswas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nobp' => 'required|string|unique:mahasiswas,nobp',
            'jurusan' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'tglahir' => 'required|string|max:255',
            'email' => 'required|email|unique:mahasiswas,email',
            'nohp' => 'required|string|unique:mahasiswas,nohp'
        ]);

        DB::table('mahasiswas')->insert([
            'name' => $request->name,
            'nobp' => $request->nobp,
            'jurusan' => $request->jurusan,
            'prodi' => $request->prodi,
            'tglahir' => $request->tglahir,
            'email' => $request->email,
            'nohp' => $request->nohp,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('mahasiswas.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function show(string $id)
    {
        return view('mahasiswas.create');
    }

    public function edit(string $id)
    {
        $mahasiswa = DB::table('mahasiswas')->where('id', $id)->first();
        return view('mahasiswas.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nobp' => 'required|string|unique:mahasiswas,nobp,'.$id,
            'jurusan' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'tglahir' => 'required|string|max:255',
            'email' => 'required|email|unique:mahasiswas,email,'.$id,
            'nohp' => 'required|string|unique:mahasiswas,nohp,'.$id
        ]);

        DB::table('mahasiswas')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'nobp' => $request->nobp,
                'jurusan' => $request->jurusan,
                'prodi' => $request->prodi,
                'tglahir' => $request->tglahir,
                'email' => $request->email,
                'nohp' => $request->nohp,
                'updated_at' => now()
            ]);

        return redirect()->route('mahasiswas.index')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('mahasiswas')->where('id', $id)->delete();
        return redirect()->route('mahasiswas.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function selectView()
    {
        $dosens = DB::lates()->paginate(10);
        return view('dosens.index',['dosens'=>$dosens]);
    }
}
