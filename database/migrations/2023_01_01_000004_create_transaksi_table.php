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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peserta');
            $table->string('foto_bukti_transaksi');
            $table->decimal('total_tagihan', 15, 2);
            $table->date('tanggal_pembayaran');
            $table->decimal('setoran_tagihan', 15, 2);
            $table->string('kategori');
            $table->enum('keterangan', ['Lunas', 'Belum Lunas']);
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
