@extends('layouts.main')
@section('title')
Daftar Dosen
<style>
       main>.container {
           padding: 60px 15px 0;
       }
      h1 {
           text-align: center;
           color: #333;
       }


       table {
           width: 100%;
           border-collapse: collapse;
           margin-top: 20px;
       }


       th,
       td {
           text-align: left;
           padding: 12px 15px;
           border-bottom: 1px solid #ddd;
       }


       th {
           background-color: #007BFF;
           color: #fff;
       }


       tr:hover {
           background-color: #f1f1f1;
       }
      
       .form-container {
           background-color: #fff;
           max-width: 500px;
           margin: auto;
           padding: 30px 40px;
           border-radius: 10px;
           box-shadow: 0 4px 12px rgba(0,0,0,0.1);
       }


       h2 {
           text-align: center;
           margin-bottom: 25px;
           color: #333;
       }


       label {
           display: block;
           margin-bottom: 6px;
           font-weight: bold;
           color: #555;
       }


       input[type="text"],
       input[type="email"] {
           width: 100%;
           padding: 10px 12px;
           /* margin-bottom: 5px; */
           border: 1px solid #ccc;
           border-radius: 6px;
           font-size: 15px;
       }


       input[type="text"]:focus,
       input[type="email"]:focus {
           border-color: #007BFF;
           outline: none;
           box-shadow: 0 0 5px rgba(0,123,255,0.3);
       }


       button {
           width: 100%;
           padding: 12px;
           background-color: #072A50FF;
           border: none;
           color: white;
           font-size: 16px;
           border-radius: 6px;
           cursor: pointer;
           transition: background-color 0.3s ease;
       }


       button:hover {
           background-color: #0056b3;
       }


       .form-group {
           margin-bottom: 20px;
       }
   </style>

@endsection
@section('content')
  <h1>Daftar Dosen jurusan ti</h1>
  <table>
    <thead>
      <tr>
        <th>Id</th>
        <th>Nama</th>
        <th>Nik</th>
        <th>Jurusan</th>
      </tr>
    </thead>
    <tbody>
     @foreach ($dsn as $dosen)
     <tr>
      <td>{{ $dosen->id}}</td>
      <td>{{ $dosen->name  }} </td>
      <td>{{ $dosen->nik  }} </td>
      <td>{{ $dosen->keahlian  }} </td>
   
    </tr>
     @endforeach
  </table>
 
@endsection
