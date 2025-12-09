<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // inisiasi tabel pruduk
    protected $table = 'tb_products';

    // inisiasi primary key di dalam tabel produk
    protected $primaryKey = 'id_produk';

    // inisiasi kolom yang dapat diisi secara massal
    protected $fillable = [
        'kode_produk',
        'nama_produk',
        'deskripsi_produk',
        'harga',
        'stok',
        'gambar_produk',
        'kategori_id',
    ];

    // inisiasi data yang tidak boleh kita isi
    protected $guarded = [
        'id_produk',
    ];
}
