@extends('layouts.main')
@section('title','Daftar Dosen')
@section('content')
<h1>Daftar Dosen TI</h1>
<ol>
    @forelse ($dsn as $namaDosen)
    <li>{{ $namaDosen }}</li>
    @empty
    <div class="alert alert-warning d-inline-block">daftar dosen tidak ada</div>
    @endforelse
</ol>
@endsection