<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('langganan_siswa', function (Blueprint $table) {
            $table->unsignedBigInteger('id_langganan_siswa')->primary();
            $table->unsignedBigInteger('id_users_siswa');
            $table->unsignedBigInteger('id_paket_langganan');
            $table->date('mulai_tanggal');
            $table->date('akhir_tanggal');
            $table->integer('total_sesi')->default(0);
            $table->integer('sisa_sesi')->default(0);
            $table->string('status_langganan', 30)->default('aktif');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_users_siswa')->references('id_users')->on('users');
            $table->foreign('id_paket_langganan')->references('id_paket_langganan')->on('paket_langganan');
            $table->index(['id_users_siswa', 'status_langganan']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('langganan_siswa');
    }
};



