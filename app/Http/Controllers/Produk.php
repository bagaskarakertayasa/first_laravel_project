<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class Produk extends Controller
{
    public function index()
    {
        $data_toko = [
            'nama_toko' => 'Toko Elektronik',
            'alamat_toko' => 'Jl. Sudirman No. 45',
            'kontak_toko' => '081234567890',
        ];

        // disini terdapat 2 cara untuk show data dari database ke view
        // cara pertama dengan Eloquent ORM
        $data_produk = Product::get(); // query untuk mengambil semua data produk dari tabel produk

        // cara kedua dengan Query Builder
        // $query_builder = DB::table('tb_products')->get(); // query untuk mengambil semua data produk dari tabel produk

        return view('pages.produk.show', [
            'data_toko' => $data_toko,
            'data_produk' => $data_produk,
            // 'produk' => $query_builder, // gunakan ini jika memakai query builder
        ]);
    }

    public function add()
    {
        return view('pages.produk.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:150',
            'deskripsi' => 'required|string',
            'harga_produk' => 'required|integer',
            'kategori' => 'required|integer',
        ]);

        Product::create([
            'nama_produk' => $request->nama_produk,
            'deskripsi_produk' => $request->deskripsi,
            'harga' => $request->harga_produk,
            'kategori_id' => $request->kategori,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/product')->with('pesan', 'Produk berhasil ditambahkan!');
    }
}
