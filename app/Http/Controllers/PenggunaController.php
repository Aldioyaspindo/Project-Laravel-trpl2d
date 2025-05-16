<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
// use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StorePenggunaRequest; // Pastikan path-nya betul
use App\Http\Requests\UpdatePenggunaRequest; // Pastikan path-nya betul
use Illuminate\Support\Facades\Storage;

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
    
        if ($request->hasFile('file_upload')) {
            $file = $request->file('file_upload');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename, 'public');
            $data['file_upload'] = $path;
        }
    
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
        $data = $request->validated();
    
        // Jika password diisi, hash dan masukkan ke data
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']); // Jangan update password jika kosong
        }
    
        // Jika ada file baru diupload
        if ($request->hasFile('file_upload')) {
            // Hapus file lama jika ada
            if ($pengguna->file_upload && Storage::disk('public')->exists($pengguna->file_upload)) {
                Storage::disk('public')->delete($pengguna->file_upload);
            }
    
            // Simpan file baru
            $file = $request->file('file_upload');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename, 'public');
            $data['file_upload'] = $path;
        }
    
        // Update data ke database
        $pengguna->update($data);
    
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
