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
        Schema::create('bank_sampah', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->constrained(
                table: 'users',
                indexName: 'bank_sampah_user_id'
            );
            $table->unsignedBigInteger('jenis_sampah_id')->constrained(
                table: 'jenis_sampah',
                indexName: 'bank_sampah_jenis_sampah_id'
            );
            $table->float('berat_sampah');
            $table->integer('total_point')->default(0);
            $table->string('status_setor')->default(0);
            $table->date('tgl_setor')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_sampah');
    }
};
