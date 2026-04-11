<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftaran_kelas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pendaftaran_kelas')->primary();
            $table->unsignedBigInteger('id_users_siswa');
            $table->unsignedBigInteger('id_kelas');
            $table->unsignedBigInteger('id_langganan_siswa');
            $table->timestamp('terdaftar_pada')->useCurrent();
            $table->boolean('aktif')->default(true)->index();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_users_siswa')->references('id_users')->on('users');
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas');
            $table->foreign('id_langganan_siswa')->references('id_langganan_siswa')->on('langganan_siswa');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_kelas');
    }
};



