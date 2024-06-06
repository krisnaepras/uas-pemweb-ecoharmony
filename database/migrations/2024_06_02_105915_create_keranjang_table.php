<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //FK: user, pruduk_id(1toN)
        Schema::create('keranjang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->constrained(
                table: 'users',
                indexName: 'keranjang_user_id'
            );
            $table->unsignedBigInteger('produk_id')->constrained(
                table: 'produk',
                indexName: 'keranjang_produk_id'
            );
            $table->integer('jumlah_barang'); //masing-masing produk pada keranjang
            $table->integer('total_harga'); //jumlah*harga masing-masing produk
            $table->integer('status')->default(0); //0=keranjang, 1=checkout, 2=selesai
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keranjang');
    }
};
