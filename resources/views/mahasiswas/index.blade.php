@extends('layouts.main')

@section('title', 'Daftar Mahasiswa')

@section('content')



<div class="container" style="margin-top: 5rem;">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Daftar Mahasiswa</h2>
        <a type="button" class="btn btn-success" href="{{ route('mahasiswas.create') }}">
            <i class="fa fa-plus"></i> Tambah Mahasiswa
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
                    <th>Nomor BP</th>
                    <th>Jurusan</th>
                    <th>Prodi</th>
                    <th>Tanggal Lahir</th>
                    <th>Email</th>
                    <th>No. HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mahasiswas as $mahasiswa)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $mahasiswa->name }}</td>
                    <td>{{ $mahasiswa->nobp }}</td>
                    <td>{{ $mahasiswa->jurusan }}</td>
                    <td>{{ $mahasiswa->prodi }}</td>
                    <td>{{ $mahasiswa->tglahir }}</td>
                    <td>{{ $mahasiswa->email }}</td>
                    <td>{{ $mahasiswa->nohp }}</td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="{{ route('mahasiswas.edit', $mahasiswa->id) }}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <form action="{{ route('mahasiswas.destroy', $mahasiswa->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center">Tidak ada data mahasiswa.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {{ $mahasiswas->links() }}
    </div>

</div>
@endsection
