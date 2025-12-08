<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Produk extends Controller
{
    public function index()
    {
        $data_toko = [
            'nama_toko' => 'Toko Elektronik',
            'alamat_toko' => 'Jl. Sudirman No. 45',
            'kontak_toko' => '081234567890',
        ];
        return view('pages.product', $data_toko);
    }

    public function add()
    {
        return view('pages.add_product');
    }
}
