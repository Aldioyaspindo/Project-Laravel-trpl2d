@extends('layouts.main')

@section('content')
<div class="max-w-xl mx-auto mt-20 bg-white p-8 rounded shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Form Tambah Pengguna</h2>

    @if(session('success'))
        <div class="mb-4 p-4 rounded bg-green-100 text-green-800 border border-green-300">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mb-4 p-4 rounded bg-red-100 text-red-800 border border-red-300">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('penggunas.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf

        <div>
            <label class="block mb-1 font-semibold text-gray-700">Nama</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring focus:border-blue-400">
        </div>

        <div>
            <label class="block mb-1 font-semibold text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring focus:border-blue-400">
            @error('email')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>

        <div>
            <label class="block mb-1 font-semibold text-gray-700">Password</label>
            <input type="password" name="password" class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring focus:border-blue-400">
            @error('password')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>

        <div>
            <label class="block mb-1 font-semibold text-gray-700">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring focus:border-blue-400">
            @error('password_confirmation')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>

        <div>
            <label class="block mb-1 font-semibold text-gray-700">No. HP</label>
            <input type="text" name="phone" value="{{ old('phone') }}" class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring focus:border-blue-400">
            @error('phone')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>

        <div>
            <label class="block mb-1 font-semibold text-gray-700">Upload File (PDF/JPG/PNG)</label>
            <input type="file" name="file_upload" accept=".pdf, .png, .jpg, .jpeg" class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring focus:border-blue-400">
            @error('file_upload')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>

        <div class="text-right">
            <button type="submit" class="px-5 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Simpan</button>
        </div>
    </form>
</div>
@endsection
