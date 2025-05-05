<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StorePenggunaRequest; // Pastikan path-nya betul
use App\Http\Requests\UpdatePenggunaRequest; // Pastikan path-nya betul

class PenggunaController extends Controller
{
    /**
     * Tampilkan daftar pengguna.
     */
    public function index()
    {
        $penggunas = Pengguna::latest()->paginate(10);
        return view('penggunas.index', compact('penggunas'));
    }

    /**
     * Tampilkan form untuk menambah pengguna.
     */
    public function create()
    {
        return view('penggunas.create');
    }

    /**
     * Simpan data pengguna baru.
     */
    public function store(StorePenggunaRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        Pengguna::create($data);

        return redirect()->route('penggunas.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit pengguna.
     */
    public function edit(string $id)
    {
        $pengguna = Pengguna::findOrFail($id);
        return view('penggunas.edit', compact('pengguna'));
    }

    /**
     * Update data pengguna.
     */
    public function update(UpdatePenggunaRequest $request, $id)
    {
        $pengguna = Pengguna::findOrFail($id);
    
        // Update data pengguna setelah validasi
        $pengguna->name = $request->name;
        $pengguna->email = $request->email;
        $pengguna->phone = $request->phone;
    
        if ($request->filled('password')) {
            $pengguna->password = Hash::make($request->password);
        }
    
        $pengguna->save();
    
        return redirect()->route('penggunas.index')->with('success', 'Pengguna berhasil diperbarui.');
    }
    

    /**
     * Hapus data pengguna.
     */
    public function destroy(string $id)
    {
        $pengguna = Pengguna::findOrFail($id);
        $pengguna->delete();

        return redirect()->route('penggunas.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}
