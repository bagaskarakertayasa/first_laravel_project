@extends('layouts.master')

@section('title', 'Detail Produk')

@section('content')
<h1>Detail produk kami</h1>
<hr>
<div class="card">    
    <div class="card-body">
        <img src="http://placehold.co/600x400" class="img-fluid" alt="">
        <p class="mt-3">{{ $data_produk->nama_produk }}</p>
        <p>Kode Produk: {{ $data_produk->kode_produk }}</p>
        <p>{{ $data_produk->deskripsi_produk }}</p>
        <p>Kategori: {{ $data_kategori->firstWhere('id_kategori', $data_produk->kategori_id)->nama_kategori }}</p>
        <p>Stok: {{ $data_produk->stok }}</p>        
        <p>Harga: Rp{{ number_format($data_produk->harga, 0, ',', '.') }}</p>
        <a href="/product" class="btn btn-primary">Kembali</a>
    </div>
</div>
@endsection
