<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profil_siswa', function (Blueprint $table) {
            $table->unsignedBigInteger('id_profil_siswa')->primary();
            $table->unsignedBigInteger('id_users')->unique();
            $table->string('nomor_hp', 30)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin', 20)->nullable();
            $table->text('alamat')->nullable();
            $table->string('kontak_darurat_nama')->nullable();
            $table->string('kontak_darurat_hp', 30)->nullable();
            $table->text('catatan_medis')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_users')->references('id_users')->on('users')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profil_siswa');
    }
};



