@extends('layouts.main')

@section('title', 'Edit Donasi')

@section('content')

    <div class="container bg-white w-[80rem] mx-auto p-8 mt-20 flex flex-col items-center rounded-[20px]"
        style="margin-top: 100px; margin-bottom: 100px;">
        <div class="w-[45rem]">
            <h3 class="text-center mb-5 text-4xl font-bold">Donasi Kamu Akan di Sampaikan Kepada Mereka Yang Membutuhkan</h3>

            {{-- Tampilkan Pesan Error Jika Ada --}}
            @if ($errors->any())
                <div class="alert alert-danger p-4 bg-red-100 border border-red-500 rounded-md mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-red-500">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="flex justify-center items-center min-h-screen bg-white">
                <div class="w-[35rem] bg-white p-6 rounded-lg shadow-lg">
                    <form action="{{ route('donasi.update', $donasi->id) }}" method="POST" class="w-full">
                        @method('PUT')
                        @csrf
                        <div class="form-group mb-4">
                            <label for="nama_donatur" class="font-semibold">Nama Donatur</label>
                            <input type="text" id="nama_donatur" name="nama_donatur"
                                class="form-control border-2 w-full border-gray-500 h-[3rem] rounded-2xl p-4"
                                value="{{ old('nama_donatur', $donasi->nama_donatur) }}" required placeholder="Nama">
                        </div>

                        <div class="form-group mb-4">
                            <label for="email" class="font-semibold">Email:</label>
                            <input type="email" id="email" name="email"
                                class="form-control border-2 w-full border-gray-500 h-[3rem] rounded-2xl p-4"
                                value="{{ old('email', $donasi->email) }}" required placeholder="Email">
                        </div>

                        <div class="form-group mb-4">
                            <label for="nominal" class="font-semibold">Masukkan Nominal:</label>
                            <input type="number" id="nominal" name="nominal"
                                class="form-control border-2 w-full border-gray-500 h-[3rem] rounded-2xl p-4"
                                value="{{ old('nominal', $donasi->nominal) }}" required min="1000" placeholder="Masukan Nominal">
                        </div>

                        <div class="mb-4 form-group">
                            <label for="metode_pembayaran" class="block mb-2 font-semibold">Metode Pembayaran</label>
                            <select name="metode_pembayaran" id="metode_pembayaran"
                                class="form-control border-2 w-full border-gray-500 h-[4rem] rounded-2xl p-4">
                                <option value="">-- Pilih Metode Pembayaran --</option>
                                <option value="BRI" {{ old('metode_pembayaran', $donasi->metode_pembayaran) == 'BRI' ? 'selected' : '' }}>BRI</option>
                                <option value="BNI" {{ old('metode_pembayaran', $donasi->metode_pembayaran) == 'BNI' ? 'selected' : '' }}>BNI</option>
                                <option value="MANDIRI" {{ old('metode_pembayaran', $donasi->metode_pembayaran) == 'MANDIRI' ? 'selected' : '' }}>Mandiri</option>
                                <option value="DANA" {{ old('metode_pembayaran', $donasi->metode_pembayaran) == 'DANA' ? 'selected' : '' }}>DANA</option>
                                <option value="BCA" {{ old('metode_pembayaran', $donasi->metode_pembayaran) == 'BCA' ? 'selected' : '' }}>BCA</option>
                                <option value="OVO" {{ old('metode_pembayaran', $donasi->metode_pembayaran) == 'OVO' ? 'selected' : '' }}>OVO</option>
                                <option value="GOPAY" {{ old('metode_pembayaran', $donasi->metode_pembayaran) == 'GOPAY' ? 'selected' : '' }}>Gopay</option>
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label for="tanggal_donasi" class="font-semibold">Tanggal Donasi:</label>
                            <input type="date" id="tanggal_donasi" name="tanggal_donasi"
                                class="form-control border-2 w-full border-gray-500 h-[3rem] rounded-2xl p-4"
                                value="{{ old('tanggal_donasi', $donasi->tanggal_donasi) }}" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="dukungan_doa" class="font-semibold">Dukungan & Doa:</label>
                            <input type="text" id="dukungan_doa" name="dukungan_doa"
                                class="form-control border-2 w-full border-gray-500 h-[10rem] rounded-2xl p-4"
                                value="{{ old('dukungan_doa', $donasi->dukungan_doa) }}" placeholder="Berikan Pesan">
                        </div>

                        <div class="form-group mb-4">
                            <label for="status" class="font-semibold">Status:</label>
                            <select name="status" id="status" class="form-control w-full" required>
                                <option value="menunggu konfirmasi" {{ old('status', $donasi->status) == 'menunggu konfirmasi' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                                <option value="dikonfirmasi" {{ old('status', $donasi->status) == 'dikonfirmasi' ? 'selected' : '' }}>Dikonfirmasi</option>
                                <option value="batal" {{ old('status', $donasi->status) == 'batal' ? 'selected' : '' }}>Batal</option>
                            </select>
                        </div>

                        <button type="submit"
                            class="btn btn-primary mt-3 w-full py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
