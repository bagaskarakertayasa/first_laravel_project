@extends('layouts.master')

@section('title', 'Edit Kategori Produk')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="/kategori/{{ $data->id_kategori }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control" value="{{ $data->nama_kategori }}" placeholder="Nama Kategori">
                @error('nama_kategori')
                <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" placeholder="Deskripsi">{{ $data->deskripsi }}</textarea>
                @error('deskripsi')
                <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</div>
@endsection
