<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_products', function (Blueprint $table) {
            $table->id('id_produk');
            $table->string('kode_produk', 50)->unique();
            $table->string('nama_produk', 150);
            $table->text('deskripsi_produk');
            $table->bigInteger('harga');
            $table->integer('stok')->default(0);
            $table->string('gambar_produk')->nullable();
            $table->unsignedBigInteger('kategori_id');
            $table->timestamps();

            // inget kalau mau bikin foreign key harus perhatiin urutan file jadi taruh file ini di paling bawah folder migrations
            $table->foreign('kategori_id')->references('id_kategori')->on('tb_kategori')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
