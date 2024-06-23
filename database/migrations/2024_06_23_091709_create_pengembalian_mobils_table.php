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
        Schema::create('pengembalian_mobils', function (Blueprint $table) {
            $table->id();
            $table->string('Invoice_Peminjaman');
            $table->string('nama');
            $table->string('model');
            $table->integer('QTY');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->integer('lama_sewa');
            $table->integer('harga_sewa');
            $table->date('tanggal_kembali');
            $table->integer('kelebihan_hari');
            $table->unsignedInteger('denda_keterlambatan');
            $table->unsignedInteger('total_bayar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalian_mobils');
    }
};
