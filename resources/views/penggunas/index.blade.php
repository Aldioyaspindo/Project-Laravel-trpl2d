@extends('layouts.main')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 mt-[100px]">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Daftar Pengguna</h2>

        <div class="flex justify-end mb-4">
            <a href="{{ route('penggunas.create') }}"
                class="inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                + Tambah Pengguna
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-4 rounded bg-green-100 text-green-800 border border-green-300">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white rounded-lg shadow-md">
            <table class="min-w-full divide-y divide-gray-200 text-sm text-left">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3 font-medium">Nama</th>
                        <th class="px-6 py-3 font-medium">Email</th>
                        <th class="px-6 py-3 font-medium">Telepon</th>
                        <th class="px-6 py-3 font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-gray-700">
                    @forelse ($penggunas as $user)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">{{ $user->name }}</td>
                            <td class="px-6 py-4">{{ $user->email }}</td>
                            <td class="px-6 py-4">{{ $user->phone }}</td>
                            <td class="px-6 py-4 space-x-2">
                                <a href="{{ route('penggunas.edit', $user->id) }}"
                                    class="inline-block px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Edit</a>

                                <form action="{{ route('penggunas.destroy', $user->id) }}" method="POST" class="inline-block"
                                    onsubmit="return confirm('Yakin hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">Tidak ada data pengguna.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $penggunas->links() }}
        </div>
    </div>
@endsection