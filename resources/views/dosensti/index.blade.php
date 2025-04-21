@extends('layouts.main')
@section('title')
Daftar Dosen TI
@endsection

@section('content')
<div class="container" style="margin-top: 5rem;">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Data Dosen TI</h2>
        <a type="button" class="btn btn-success" href="{{ route('dosensti.create') }}">
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
                    <th>Bidang</th>
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
                    <td>{{ $dosen->bidang }}</td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="{{ route('dosensti.edit', $dosen->id) }}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <form action="{{ route('dosensti.destroy', $dosen->id) }}" method="POST" class="d-inline">
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
                    <td colspan="8" class="text-center">Tidak ada data dosen TI.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-3">
        {{ $dosens->links() }}
    </div>

</div>
@endsection
