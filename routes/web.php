<?php

use Illuminate\Support\Facades\Route;

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
Route::view('/product', 'pages.product');