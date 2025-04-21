<?php

namespace App\Http\Controllers\dosen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dosenti;

class DosentiController extends Controller
{
    public function index()
    {
    $dosens = Dosenti::paginate(10);
    return view('dosensti.index', compact('dosens'));
    }

    public function create()
    {
        return view('dosensti.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            'email' => 'required|email|unique:dosens,email',
            'nohp' => 'nullable|string|max:11',
            'alamat' => 'nullable|string|max:255',
            'bidang' => 'nullable|string|max:255'
        ]);
        Dosenti::create($request->all());
        return redirect()->route('dosensti.index')->with('success', 'Data dosen berhasil ditambahkan');
    }

    public function show(string $id)
    {
        return view('dosensti.create');    
    }

    public function edit(string $id)
    {
        $dosen = Dosenti::findOrFail($id);
        return view('dosensti.edit', compact('dosen')); 
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nik' => 'required|numeric|unique:dosens,nik,'.$id,
            'email' => 'required|email|unique:dosens,email,'.$id,
            'nohp' => 'nullable|string|max:12',
            'alamat' => 'nullable|string|max:255',
            'bidang' => 'nullable|string|max:255'
        ]);
        $dosen = Dosenti::findOrFail($id);
        $dosen->update($request->all());
        return redirect()->route('dosensti.index')->with('success', 'Data dosen berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $dosen = Dosenti::findOrFail($id);
        $dosen->delete();
        return redirect()->route('dosensti.index')->with('success', 'Data dosen berhasil dihapus');
    }
}
