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
        //FK: detail_transaksi_id(1to1)
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->constrained(
                table: 'users',
                indexName: 'transaksi_user_id'
            );
            $table->unsignedBigInteger('detail_transaksi_id')->constrained(
                table: 'transaksi',
                indexName: 'detail_transaksi_transaksi_id'
            );
            $table->integer('status_pesanan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
