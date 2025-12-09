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
        DB::table('tb_kategori')->insert([
            [
                'nama_kategori' => 'Elektronik',
                'deskripsi' => 'Kategori untuk produk elektronik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Gadget',
                'deskripsi' => 'Kategori untuk produk gadget',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Aksesoris Komputer',
                'deskripsi' => 'Kategori untuk aksesoris komputer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        
        DB::table('tb_products')->insert([
        [
            'kode_produk' => 'PRD001',
            'nama_produk' => 'PC Gaming',
            'deskripsi_produk' => 'Deskripsi untuk PC Gaming',
            'harga' => 10000000,
            'kategori_id' => 1,
            'stok' => 7,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'kode_produk' => 'PRD002',
            'nama_produk' => 'Iphone 13 Pro Max',
            'deskripsi_produk' => 'Deskripsi untuk Iphone 13 Pro Max',
            'harga' => 8000000,
            'kategori_id' => 2,
            'stok' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'kode_produk' => 'PRD003',
            'nama_produk' => 'Keyboard Mechanical',
            'deskripsi_produk' => 'Deskripsi untuk Keyboard Mechanical',
            'harga' => 500000,
            'kategori_id' => 3,
            'stok' => 15,
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
    }
}
