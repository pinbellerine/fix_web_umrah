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
        Schema::create('wisata_luar_negeri', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peserta');
            $table->string('nik', 20)->unique();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('foto_peserta')->nullable();
            $table->string('no_paspor')->unique();
            $table->string('issuing_office');
            $table->date('date_of_issued');
            $table->date('date_of_expiry');
            $table->enum('jenis_hubungan', ['Keluarga', 'Suami-istri']);
            $table->string('foto_ktp');
            $table->string('jenis_perjalanan');
            $table->date('date_of_issued_perjalanan')->nullable();
            $table->decimal('biaya', 15, 2);
            $table->date('date_of_expiry_perjalanan')->nullable();
            $table->string('hotel');
            $table->string('transportasi');
            $table->string('kode_khusus_perjalanan');
            $table->text('catatan');
            $table->string('foto_catatan');
            $table->string('username');
            $table->string('email');
            $table->string('password');
            $table->string('no_telepon', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wisata_luar_negeri');
    }
};
