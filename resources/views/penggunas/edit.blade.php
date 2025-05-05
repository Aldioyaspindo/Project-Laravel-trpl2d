@extends('layouts.main')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Edit Pengguna</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-800 border border-red-300 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('penggunas.update', $pengguna->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <!-- Nama Field -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $pengguna->name) }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <!-- Email Field -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $pengguna->email) }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <!-- Telepon Field -->
        <div class="mb-4">
            <label for="phone" class="block text-sm font-medium text-gray-700">Telepon:</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone', $pengguna->phone) }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">Update</button>
        </div>
    </form>
</div>
@endsection
