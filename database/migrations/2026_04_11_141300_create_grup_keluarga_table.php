<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('grup_keluarga', function (Blueprint $table) {
            $table->unsignedBigInteger('id_grup_keluarga')->primary();
            $table->string('nama_grup');
            $table->unsignedBigInteger('id_users_siswa_utama');
            $table->unsignedBigInteger('id_paket_langganan');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_users_siswa_utama')->references('id_users')->on('users');
            $table->foreign('id_paket_langganan')->references('id_paket_langganan')->on('paket_langganan');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('grup_keluarga');
    }
};



