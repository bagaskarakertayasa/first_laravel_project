<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // query untuk menambah data
        DB::table('tb_products')->insert([
        [
            'nama_produk' => 'Produk A',
            'deskripsi_produk' => 'Deskripsi untuk Produk A',
            'harga' => 100000,
            'kategori_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'nama_produk' => 'Produk B',
            'deskripsi_produk' => 'Deskripsi untuk Produk B',
            'harga' => 150000,
            'kategori_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'nama_produk' => 'Produk C',
            'deskripsi_produk' => 'Deskripsi untuk Produk C',
            'harga' => 200000,
            'kategori_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
    }
}
