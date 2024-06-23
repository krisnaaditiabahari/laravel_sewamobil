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
        Schema::create('pinjams', function (Blueprint $table) {
            $table->id();
            $table->string('Invoice_Peminjaman');
            $table->string('Nama');
            $table->string('model');
            $table->integer('QTY');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->integer('lama_sewa');
            $table->integer('harga_sewa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjams');
    }
};
