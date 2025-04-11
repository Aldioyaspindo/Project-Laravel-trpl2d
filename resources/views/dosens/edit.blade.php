@extends('layouts.main')

@section('title', 'Edit Dosen')

@section('content')
<div class="container" style="margin-top: 100px;">
    <h3>Edit Data Dosen</h3>

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

    <form action="{{ route('dosens.update', $dosen->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama :</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $dosen->name) }}" required>
        </div>
        
        <div class="form-group">
            <label for="nik">NIK :</label>
            <input type="text" name="nik" id="nik" class="form-control" value="{{ old('nik', $dosen->nik) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $dosen->email) }}" required>
        </div>

        <div class="form-group">
            <label for="nohp">Nomor HP :</label>
            <input type="text" name="nohp" id="nohp" class="form-control" value="{{ old('nohp', $dosen->nohp) }}" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat :</label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="{{ old('alamat', $dosen->alamat) }}" required>
        </div>

        <div class="form-group">
            <label for="keahlian">Keahlian :</label>
            <input type="text" name="keahlian" id="keahlian" class="form-control" value="{{ old('keahlian', $dosen->keahlian) }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Simpan</button>
    </form>
</div>
@endsection
