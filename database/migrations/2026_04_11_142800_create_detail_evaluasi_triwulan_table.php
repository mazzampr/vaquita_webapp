<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_evaluasi_triwulan', function (Blueprint $table) {
            $table->unsignedBigInteger('id_detail_evaluasi_triwulan')->primary();
            $table->unsignedBigInteger('id_evaluasi_triwulan');
            $table->unsignedBigInteger('id_users_siswa');
            $table->unsignedBigInteger('id_users_pelatih');
            $table->string('status_perkembangan', 20)->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_evaluasi_triwulan')->references('id_evaluasi_triwulan')->on('evaluasi_triwulan')->cascadeOnDelete();
            $table->foreign('id_users_siswa')->references('id_users')->on('users');
            $table->foreign('id_users_pelatih')->references('id_users')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_evaluasi_triwulan');
    }
};



