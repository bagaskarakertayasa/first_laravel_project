<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Produk;

Route::get('/', function () {
    return view('pages.beranda');
});

Route::get('/about', function () {
    $data = [
        'nama' => 'John Doe',
        'email' => 'johndoe@gmail.com',
        'alamat' => 'Jl. Merdeka No. 123',
        'umur' => 30,
    ];
    return view('pages.about', $data);
});

Route::view('/contact', 'pages.contact');

Route::get('/product', [Produk::class, 'index']);

Route::get('/product/add', [Produk::class, 'add']);
Route::post('/product', [Produk::class, 'store']);
Route::get('/product/{id}', [Produk::class, 'detail']);

Route::get('/product/edit/{id}', [Produk::class, 'edit']);
Route::put('/product/{id}', [Produk::class, 'update']);