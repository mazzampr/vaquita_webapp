<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('anggota_grup_keluarga', function (Blueprint $table) {
            $table->unsignedBigInteger('id_anggota_grup_keluarga')->primary();
            $table->unsignedBigInteger('id_grup_keluarga');
            $table->unsignedBigInteger('id_users_siswa');
            $table->string('hubungan')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_grup_keluarga')->references('id_grup_keluarga')->on('grup_keluarga')->cascadeOnDelete();
            $table->foreign('id_users_siswa')->references('id_users')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anggota_grup_keluarga');
    }
};



