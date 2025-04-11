@extends('layouts.main')

@section('title', 'Tambah Dosen')

@section('content')

<div class="container" style="margin-top: 100px;">
    <h3>Tambah Data Dosen</h3>
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

    <form action="{{ route('dosens.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama :</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="nik">NIK :</label>
            <input type="text" id="nik" name="nik" class="form-control" value="{{ old('nik') }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="nohp">Nomor HP :</label>
            <input type="text" id="nohp" name="nohp" class="form-control" value="{{ old('nohp') }}" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat :</label>
            <input type="text" id="alamat" name="alamat" class="form-control" value="{{ old('alamat') }}" required>
        </div>

        <div class="form-group">
            <label for="keahlian">Keahlian :</label>
            <input type="text" id="keahlian" name="keahlian" class="form-control" value="{{ old('keahlian') }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection
