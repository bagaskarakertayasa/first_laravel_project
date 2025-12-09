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
@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        Daftar Produk
        <div class="d-flex gap-2">
            @if( request('keyword') != '' )
            <a href="/product" class="btn btn-secondary">Reset</a>
            @endif
            <form class="input-group" style="width: 300px;">
                <input type="text" name="keyword" value="{{ Request()->keyword }}" class="form-control"
                    placeholder="Cari Data" aria-describedby="button-addon2">
                <button class="btn btn-success" type="submit" id="button-addon2">Cari</button>
            </form>
        </div>
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
                @forelse ($data_produk as $index => $product)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $product->nama_produk }}</td>
                    <td>{{ $product->deskripsi_produk }}</td>
                    <td>Rp{{ number_format($product->harga, 0, ',', '.') }}</td>
                    <td>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#hapus{{ $product->id_produk }}">
                            Hapus
                        </button>
                        <a href="/product/edit/{{ $product->id_produk }}" class="btn btn-success me-1">Edit</button>
                            <a href="/product/{{ $product->id_produk }}" class="btn btn-info">Detail</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Data tidak ditemukan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@foreach ($data_produk as $product)
<div class="modal fade" id="hapus{{ $product->id_produk }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <form action="/product/{{ $product->id_produk }}" method="POST" class="modal-content">
            @method('DELETE')
            @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $product->nama_produk }} akan dihapus, yakin?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
        </form>
    </div>
</div>
@endforeach
@endsection
