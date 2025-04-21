@extends('layouts.main')
@section('title')
Daftar Dosen TI
@endsection

@section('content')
<h1 class="mt-5">Data Dosen TI</h1>
<a type="button" class="btn btn-success" href="{{ route('dosensti.create') }}">Tambah Dosen</a>
   
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
            <th>Bidang</th>
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
            <td>{{ $dosen->bidang }}</td>
            <td>
                <a type="button" class="btn btn-warning" href="{{ route('dosensti.edit', $dosen->id) }}">Edit</a>
                <form action="{{ route('dosensti.destroy', $dosen->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                         <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                         </svg>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="pagination-container">
    {{ $dosens -> links() }}
</div>
@endsection