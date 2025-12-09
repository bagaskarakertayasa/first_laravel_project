<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;

class Produk extends Controller
{
    public function index(Request $request)
    {
        $data_toko = [
            'nama_toko' => 'Toko Elektronik',
            'alamat_toko' => 'Jl. Sudirman No. 45',
            'kontak_toko' => '081234567890',
        ];

        $keyword = $request->keyword;

        if ($request->has('keyword') && !$request->filled('keyword')) {
            return redirect('/product');
        } else {
            $produk = Product::where('nama_produk', 'like', "%{$keyword}%")
            ->orWhere('deskripsi_produk', 'like', "%{$keyword}%")
            ->orWhere('harga', 'like', "%{$keyword}%")
            ->join('tb_kategori', 'tb_products.kategori_id', '=', 'tb_kategori.id_kategori')
            ->where('tb_kategori.nama_kategori', 'like', "%{$keyword}%")
            ->get();            
        }

        // disini terdapat 2 cara untuk show data dari database ke view
        // cara pertama dengan Eloquent ORM
        // $data_produk = Product::get(); // query untuk mengambil semua data produk dari tabel produk

        // cara kedua dengan Query Builder
        // $query_builder = DB::table('tb_products')->get(); // query untuk mengambil semua data produk dari tabel produk

        return view('pages.produk.show', [
            'data_toko' => $data_toko,
            'data_produk' => $produk,
            // 'produk' => $query_builder, // gunakan ini jika memakai query builder
        ]);
    }

    public function add()
    {
        $data_kategori = Kategori::all();
        return view('pages.produk.add', [
            'data_kategori' => $data_kategori,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|min:4|max:50',
            'deskripsi' => 'required|string',
            'harga_produk' => 'required|integer',
            'kategori' => 'required',
            'kategori.integer' => 'Kategori produk harus berupa angka!',
            'stok' => 'required|integer',
        ],[
            'nama_produk.required' => 'Nama produk wajib diisi!',
            'nama_produk.string' => 'Nama produk harus berupa string!',
            'nama_produk.min' => 'Nama produk minimal 4 karakter!',
            'nama_produk.max' => 'Nama produk maksimal 50 karakter!',
            'deskripsi.required' => 'Deskripsi produk wajib diisi!',
            'harga_produk.required' => 'Harga produk wajib diisi!',
            'harga_produk.integer' => 'Harga produk harus berupa angka!',
            'kategori.required' => 'Kategori produk wajib diisi!',
            'kategori.integer' => 'Kategori produk harus berupa angka!',
            'stok.required' => 'Stok produk wajib diisi!',
            'stok.integer' => 'Stok produk harus berupa angka!',
        ]);

        Product::create([
            'kode_produk' => 'PRD' . rand(0, 99999),
            'nama_produk' => $request->nama_produk,
            'deskripsi_produk' => $request->deskripsi,
            'harga' => $request->harga_produk,
            'kategori_id' => $request->kategori,
            'stok' => $request->stok,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/product')->with('pesan', 'Produk berhasil ditambahkan!');
    }

    public function detail($id)
    {
        $data_produk = Product::find($id);
        $data_kategori = Kategori::all();

        if (!$data_produk) {
            return redirect('/product')->with('error', 'Produk tidak ditemukan!');
        }

        return view('pages.produk.detail', [
            'data_produk' => $data_produk,
            'data_kategori' => $data_kategori,
        ]);
    }

    public function edit($id)
    {
        $data_produk = Product::find($id);
        $data_kategori = Kategori::all();

        if (!$data_produk) {
            return redirect('/product')->with('error', 'Produk tidak ditemukan!');
        }

        return view('pages.produk.edit', [
            'data_produk' => $data_produk,
            'data_kategori' => $data_kategori,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required|string|min:4|max:50',
            'deskripsi' => 'required|string',
            'harga_produk' => 'required|integer',
            'kategori' => 'required|integer',
            'stok' => 'required|integer',
        ],[
            'nama_produk.required' => 'Nama produk wajib diisi!',
            'nama_produk.string' => 'Nama produk harus berupa string!',
            'nama_produk.min' => 'Nama produk minimal 4 karakter!',
            'nama_produk.max' => 'Nama produk maksimal 50 karakter!',
            'deskripsi.required' => 'Deskripsi produk wajib diisi!',
            'harga_produk.required' => 'Harga produk wajib diisi!',
            'harga_produk.integer' => 'Harga produk harus berupa angka!',
            'kategori.required' => 'Kategori produk wajib diisi!',
            'kategori.integer' => 'Kategori produk harus berupa angka!',
            'stok.required' => 'Stok produk wajib diisi!',
            'stok.integer' => 'Stok produk harus berupa angka!',
        ]);

        $data_produk = Product::find($id);

        if (!$data_produk) {
            return redirect('/product')->with('error', 'Produk tidak ditemukan!');
        }

        $data_produk->update([
            'nama_produk' => $request->nama_produk,
            'deskripsi_produk' => $request->deskripsi,
            'harga' => $request->harga_produk,
            'kategori_id' => $request->kategori,
            'stok' => $request->stok,
            'updated_at' => now(),
        ]);

        return redirect('/product')->with('pesan', 'Produk berhasil diupdate!');
    }

    public function delete($id)
    {
        $data_produk = Product::find($id);

        if (!$data_produk) {
            return redirect('/product')->with('error', 'Produk tidak ditemukan!');
        }

        $data_produk->delete();

        return redirect('/product')->with('pesan', 'Produk berhasil dihapus!');
    }
}
