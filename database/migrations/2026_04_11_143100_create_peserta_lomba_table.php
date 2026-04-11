<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peserta_lomba', function (Blueprint $table) {
            $table->unsignedBigInteger('id_peserta_lomba')->primary();
            $table->unsignedBigInteger('id_event_lomba');
            $table->unsignedBigInteger('id_kategori_lomba');
            $table->unsignedBigInteger('id_users_siswa');
            $table->unsignedBigInteger('id_users_pendaftar');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_event_lomba')->references('id_event_lomba')->on('event_lomba')->cascadeOnDelete();
            $table->foreign('id_kategori_lomba')->references('id_kategori_lomba')->on('kategori_lomba');
            $table->foreign('id_users_siswa')->references('id_users')->on('users');
            $table->foreign('id_users_pendaftar')->references('id_users')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peserta_lomba');
    }
};



