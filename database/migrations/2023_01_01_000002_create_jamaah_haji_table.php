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
        Schema::create('jamaah_haji', function (Blueprint $table) {
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
            $table->enum('jenis_hubungan', ['Keluarga', 'Suami-istri'])->nullable();
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
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('no_telepon', 20);
            $table->unsignedBigInteger('admin_login_id')->nullable();
            $table->foreign('admin_login_id')->references('id')->on('admin_login')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jamaah_haji');
    }
};
