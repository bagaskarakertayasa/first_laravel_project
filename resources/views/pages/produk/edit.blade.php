@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        Edit Produk
    </div>
    <div class="card-body">
        <form class="row g-3" action="/product/{{ $data_produk->id_produk }}" method="POST">
            @method('PUT')
            @csrf
            <div class="col-md-6">
                <label for="inputCity" class="form-label">Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk" value="{{ $data_produk->nama_produk }}">
                @error('nama_produk')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="inputZip" class="form-label">Harga</label>
                <input type="number" name="harga_produk" class="form-control" placeholder="Harga Produk" value="{{ $data_produk->harga }}">
                @error('harga_produk')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="inputZip" class="form-label">Stok</label>
                <input type="number" name="stok" class="form-control" placeholder="Stok Produk" value="{{ $data_produk->stok }}">
                @error('stok')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="inputState" class="form-label">Kategori</label>
                <select name="kategori" class="form-select">
                    <option value="" selected>Pilih...</option>
                    @foreach($data_kategori as $kategori)
                    @if($data_produk->kategori_id == $kategori->id_kategori)
                        <option value="{{ $kategori->id_kategori }}" selected>{{ $kategori->nama_kategori }}</option>
                    @else
                        <option value="{{ $kategori->id_kategori }}" {{ $data_produk->kategori_id == $kategori->id_kategori ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                    @endif
                    @endforeach
                </select>
                @error('kategori')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" placeholder="Deskripsi Produk">{{ $data_produk->deskripsi_produk }}</textarea>
                @error('deskripsi')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
