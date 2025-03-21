@extends('layouts.main')
@section('title',)
Mahasiswa PNP
@endsection
@section('content')
<h1>Daftar Mahasiswa TI</h1>
<ol>
    @foreach ($mhs as $namaMhs)
    <li>{{ $namaMhs }}</li>
    @endforeach
</ol>
@endsection