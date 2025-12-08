@extends('layouts.master')

@section('content')
<h1>Daftar produk kami</h1>
<a href="/product/add" type="button" class="btn btn-primary mt-3 mb-3">Tambah Data</a>
<div class="alert alert-primary">
    <b>Nama : </b> {{ $data_toko['nama_toko'] }} <br>
    <b>Alamat : </b> {{ $data_toko['alamat_toko'] }} <br>
    <b>Kontak : </b> {{ $data_toko['kontak_toko'] }}
</div>
@if (session('pesan'))
    <div class="alert alert-success">
        {{ session('pesan') }}
    </div>
@endif
<div class="card">    
    <div class="card-header">
        Daftar Produk
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_produk as $index => $product)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $product->nama_produk }}</td>
                    <td>{{ $product->deskripsi_produk }}</td>                    
                    <td>Rp{{ number_format($product->harga, 0, ',', '.') }}</td>                    
                    <td>
                        <button type="button" class="btn btn-success">Edit</button>
                        <button type="button" class="btn btn-danger">Hapus</button>
                    </td>
                </tr>
                @endforeach                
            </tbody>
        </table>
    </div>
</div>
@endsection
