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
            $table->string('nama_produk', 150);
            $table->text('deskripsi_produk');
            $table->integer('harga');
            $table->integer('kategori_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
