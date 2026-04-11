<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rapor_enam_bulanan', function (Blueprint $table) {
            $table->unsignedBigInteger('id_rapor_enam_bulanan')->primary();
            $table->unsignedBigInteger('id_users_siswa');
            $table->unsignedBigInteger('id_users_pelatih');
            $table->date('mulai_periode');
            $table->date('akhir_periode');
            $table->text('evaluasi')->nullable();
            $table->text('rekomendasi')->nullable();
            $table->timestamp('dikirim_pada')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_users_siswa')->references('id_users')->on('users');
            $table->foreign('id_users_pelatih')->references('id_users')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rapor_enam_bulanan');
    }
};



