<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // inisiasi tabel pruduk
    protected $table = 'products';

    // inisiasi primary key di dalam tabel produk
    protected $primaryKey = 'id';

    // inisiasi kolom yang dapat diisi secara massal
    protected $fillable = [
        'name',
        'price',
        'stock',
    ];

    // inisiasi data yang tidak boleh kita isi
    protected $guarded = [
        'id',
    ];
}
