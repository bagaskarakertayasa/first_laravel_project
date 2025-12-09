@extends('layouts.master')

@section('content')
<h1>Detail produk kami</h1>
<hr>
<div class="card">    
    <div class="card-header">
        Detail Produk
    </div>
    <div class="card-body">
        <img src="http://placehold.co/600x400" class="img-fluid" alt="">
        <p class="mt-3">{{ $data_produk->nama_produk }}</p>
        <p>{{ $data_produk->deskripsi_produk }}</p>
        <p>Rp{{ number_format($data_produk->harga, 0, ',', '.') }}</p>        
        <a href="/product" class="btn btn-primary">Kembali</a>
    </div>
</div>
@endsection
