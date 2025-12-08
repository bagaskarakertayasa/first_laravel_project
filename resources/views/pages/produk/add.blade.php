@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        Tambah Produk
    </div>
    <div class="card-body">
        <form class="row g-3" action="/product" method="POST">
            @csrf
            <div class="col-md-6">
                <label for="inputCity" class="form-label">Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk" value="{{ old('nama_produk') }}">
                @error('nama_produk')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="inputZip" class="form-label">Harga</label>
                <input type="text" name="harga_produk" class="form-control" placeholder="Harga Produk" value="{{ old('harga_produk') }}">
                @error('harga_produk')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-2">
                <label for="inputState" class="form-label">Kategori</label>
                <select name="kategori" class="form-select">
                    <option value="" selected>Pilih...</option>
                    <option value="1" {{ old('kategori') == '1' ? 'selected' : '' }}>Kelas 1</option>
                    <option value="2" {{ old('kategori') == '2' ? 'selected' : '' }}>Kelas 2</option>
                    <option value="3" {{ old('kategori') == '3' ? 'selected' : '' }}>Kelas 3</option>
                </select>
                @error('kategori')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" placeholder="Deskripsi Produk">{{ old('deskripsi') }}</textarea>
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
