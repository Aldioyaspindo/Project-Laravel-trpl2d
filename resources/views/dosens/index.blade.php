@extends('layouts.main')
@section('title')
Daftar Dosen
@endsection

@section('content')
<div class="container" style="margin-top: 5rem">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Data Dosen</h2>
        <a type="button" class="btn btn-success" href="{{ route('dosens.create') }}">
            <i class="fa fa-plus"></i> Tambah Dosen
        </a>
    </div>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Tabel Data --}}
    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle">
            <thead class="table-dark">
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
                @forelse ($dosens as $dosen)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $dosen->name }}</td>
                    <td>{{ $dosen->nik }}</td>
                    <td>{{ $dosen->email }}</td>
                    <td>{{ $dosen->nohp }}</td>
                    <td>{{ $dosen->alamat }}</td>
                    <td>{{ $dosen->keahlian }}</td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="{{ route('dosens.edit', $dosen->id) }}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <form action="{{ route('dosens.destroy', $dosen->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus?')">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">Tidak ada data dosen.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {{ $dosens->links() }}
    </div>

</div>
@endsection
