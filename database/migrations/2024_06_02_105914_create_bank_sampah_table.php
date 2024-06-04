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
        //FK: user_id(Nto1)
        Schema::create('bank_sampah', function (Blueprint $table) {
            $table->id();
            //foreign key dengan table user(one), bank_sampah(many)
            $table->unsignedBigInteger('user_id')->constrained(
                table: 'users',
                indexName: 'bank_sampah_user_id'
            );
            $table->string('jenis_sampah');
            $table->integer('berat_sampah');
            $table->integer('total_point');
            $table->string('status_setor');
            $table->date('tanggal_setor');
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
