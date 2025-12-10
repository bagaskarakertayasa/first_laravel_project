@extends('layouts.master')

@section('title', 'Kategori Produk')

@section('content')
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
        Daftar Kategori
        <div class="d-flex">
            @if( request('keyword') != '' )
            <a href="/kategori" class="btn btn-secondary" style="margin-right: 0.5em">Reset</a>
            @endif
            <form class="input-group" style="width: 300px;">
                <input type="text" name="keyword" value="{{ Request()->keyword }}" class="form-control"
                    placeholder="Cari Data" aria-describedby="button-addon2">
                <button class="btn btn-success" type="submit" id="button-addon2">Cari</button>
            </form>
            <a href="/kategori/create" class="btn btn-primary" style="margin-left: 0.5em">Tambah Kategori</a>
        </div>
    </div>
    <div class="card-body">        
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Ketegori</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kategori as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->nama_kategori }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>
                        <a href="/kategori/{{ $item->id_kategori }}/edit" class="btn btn-success">Edit</a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#hapus{{ $item->id_kategori }}">
                            Hapus
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">Data Kategori Kosong</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@foreach ($kategori as $item)
<div class="modal fade" id="hapus{{ $item->id_kategori }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <form action="/kategori/{{ $item->id_kategori }}" method="POST" class="modal-content">
            @method('DELETE')
            @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Kategori {{ $item->nama_kategori }} akan dihapus, yakin?
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
