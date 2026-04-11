<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hasil_lomba', function (Blueprint $table) {
            $table->unsignedBigInteger('id_hasil_lomba')->primary();
            $table->unsignedBigInteger('id_peserta_lomba')->unique();
            $table->string('catatan_waktu')->nullable();
            $table->integer('peringkat')->nullable();
            $table->string('prestasi')->nullable();
            $table->text('catatan')->nullable();
            $table->unsignedBigInteger('id_users_penginput');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_peserta_lomba')->references('id_peserta_lomba')->on('peserta_lomba')->cascadeOnDelete();
            $table->foreign('id_users_penginput')->references('id_users')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hasil_lomba');
    }
};



