@extends('layouts.master')

@section('title', 'About')

@section('content')
    <h1>Anda berada di halaman about</h1>
    <ul>
        <li>Nama: {{$nama}}</li>
        <li>Email: {{$email}}</li>
        <li>Alamat: {{$alamat}}</li>
        <li>Umur: {{$umur}} tahun</li>
    </ul>
@endsection