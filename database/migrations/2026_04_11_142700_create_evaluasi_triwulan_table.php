<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('evaluasi_triwulan', function (Blueprint $table) {
            $table->unsignedBigInteger('id_evaluasi_triwulan')->primary();
            $table->date('mulai_periode');
            $table->date('akhir_periode');
            $table->unsignedBigInteger('id_users_penghasil');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_users_penghasil')->references('id_users')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('evaluasi_triwulan');
    }
};



