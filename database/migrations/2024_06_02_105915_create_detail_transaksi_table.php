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
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('keranjang_id')->constrained(
                table: 'keranjang',
                indexName: 'detail_transaksi_keranjang_id'
            );
            $table->unsignedBigInteger('produk_id')->constrained(
                table: 'produk',
                indexName: 'detail_transaksi_produk_id'
            );

            $table->integer('jumlah_produk'); //jumlah produk dalam keranjang yang di checkout
            $table->integer('total'); //total dari semua produk
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi');
    }
};
