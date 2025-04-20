@extends('layouts.main')

@section('title', 'Daftar Mahasiswa')

@section('content')
   <h1>Data Mahasiswa</h1>
   <a type="button" class="btn btn-success mt-3 mb-3" href="{{ route('mahasiswas.create') }}">Tambah Mahasiswa</a>

   @if(session('success'))
       <div class="alert alert-success">
           {{ session('success') }}
       </div>
   @endif

   <table class="table table-dark">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nomor BP</th>
            <th>Jurusan</th>
            <th>Prodi</th>
            <th>Tanggal Lahir</th>
            <th>Email</th>
            <th>Nomor Handphone</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mahasiswas as $mahasiswa)
        <tr>
            <td>{{ $loop->iteration }}</td> <!-- Nomor urut otomatis -->
            <td>{{ $mahasiswa->name }}</td>
            <td>{{ $mahasiswa->nobp }}</td>
            <td>{{ $mahasiswa->jurusan }}</td>
            <td>{{ $mahasiswa->prodi }}</td> <!-- Menggunakan 'prodi' kecil -->
            <td>{{ $mahasiswa->tglahir }}</td>
            <td>{{ $mahasiswa->email }}</td>
            <td>{{ $mahasiswa->nohp }}</td>
            <td>
                <a class="btn btn-warning" href="{{ route('mahasiswas.edit', $mahasiswa->id) }}">Edit</a>
                <form action="{{ route('mahasiswas.destroy', $mahasiswa->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="pagination-container">
    {{ $mahasiswas -> links() }}
</div>
@endsection
