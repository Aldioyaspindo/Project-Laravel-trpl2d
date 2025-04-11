@extends('layouts.main')
@section('title')
Daftar Dosen
@endsection

@section('content')
   <h1>Data Dosen</h1>
   <a type="button" class="btn btn-success mt-3" href="{{ route('dosens.create') }}">Tambah Dosen</a>
   
   @if(session('success'))
        <p>{{ session('success') }}</p>
   @endif

   <table class="table table-dark mt-3">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Alamat</th>
            <th>Keahlian</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dosens as $dosen)
        <tr>
            <td>{{ $loop->iteration }}</td> <!-- Nomor urut otomatis -->
            <td>{{ $dosen->name }}</td>
            <td>{{ $dosen->nik }}</td>
            <td>{{ $dosen->email }}</td>
            <td>{{ $dosen->nohp }}</td>
            <td>{{ $dosen->alamat }}</td>
            <td>{{ $dosen->keahlian }}</td>
            <td>
                <a type="button" class="btn btn-warning" href="{{ route('dosens.edit', $dosen->id) }}">Edit</a>
                <form action="{{ route('dosens.destroy', $dosen->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection