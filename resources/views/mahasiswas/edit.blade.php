@extends('layouts.main')

@section('title', 'Edit Mahasiswa')

@section('content')
<div class="container" style="margin-top: 100px;">
    <h3>Edit Data Mahasiswa</h3> <!-- Perbaikan typo -->

    {{-- Tampilkan Pesan Error Jika Ada --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mahasiswas.update', $mahasiswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama :</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $mahasiswa->name) }}" required>
        </div>
        
        <div class="form-group">
            <label for="nobp">Nomor BP :</label>
            <input type="text" id="nobp" name="nobp" class="form-control" value="{{ old('nobp', $mahasiswa->nobp) }}" required>
        </div>

        <div class="form-group">
            <label for="jurusan">Jurusan :</label>
            <input type="text" id="jurusan" name="jurusan" class="form-control" value="{{ old('jurusan', $mahasiswa->jurusan) }}" required>
        </div>

        <div class="form-group">
            <label for="prodi">Prodi :</label>
            <input type="text" id="prodi" name="prodi" class="form-control" value="{{ old('prodi', $mahasiswa->prodi) }}" required>
        </div>

        <div class="form-group">
            <label for="tglahir">Tanggal Lahir :</label>
            <input type="date" id="tglahir" name="tglahir" class="form-control" value="{{ old('tglahir', $mahasiswa->tglahir) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $mahasiswa->email) }}" required>
        </div>  

        <div class="form-group">
            <label for="nohp">Nomor HP :</label> <!-- Perbaikan typo -->
            <input type="tel" id="nohp" name="nohp" class="form-control" value="{{ old('nohp', $mahasiswa->nohp) }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3 mb-3">Simpan</button> <!-- Tambah margin bawah -->
    </form>
</div>
@endsection
