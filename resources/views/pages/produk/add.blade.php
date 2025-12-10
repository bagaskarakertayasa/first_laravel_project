@extends('layouts.master')

@section('title', 'Tambah Produk')

@section('content')
<div class="card">    
    <div class="card-body">
        <form class="row g-3" action="/product" method="POST">
            @csrf
            <div class="col-md-6">
                <label for="inputCity" class="form-label">Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk"
                    value="{{ old('nama_produk') }}">
                @error('nama_produk')
                <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">Harga Produk</label>
                <input type="number" name="harga_produk" class="form-control" placeholder="Harga Produk"
                    value="{{ old('harga_produk') }}">
                @error('harga_produk')
                <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">Stok</label>
                <input type="number" name="stok" class="form-control" placeholder="Stok Produk"
                    value="{{ old('stok') }}">
                @error('stok')
                <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">Kategori</label>
                <select name="kategori" class="form-select">
                    <option value="" selected>Pilih...</option>
                    @foreach($data_kategori as $kategori)
                    <option value="{{ $kategori->id_kategori }}"
                        {{ old('kategori') == $kategori->id_kategori ? 'selected' : '' }}>{{ $kategori->nama_kategori }}
                    </option>
                    @endforeach
                </select>
                @error('kategori')
                <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Deskripsi</label>
                <textarea class="form-control" name="deskripsi"
                    placeholder="Deskripsi Produk">{{ old('deskripsi') }}</textarea>
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
