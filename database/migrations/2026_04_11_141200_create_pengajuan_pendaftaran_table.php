<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengajuan_pendaftaran', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pengajuan_pendaftaran')->primary();
            $table->unsignedBigInteger('id_users_siswa');
            $table->unsignedBigInteger('id_paket_langganan_diminta');
            $table->unsignedBigInteger('id_lokasi_kolam_diminati');
            $table->json('hari_diminati')->nullable();
            $table->time('jam_diminati')->nullable();
            $table->string('status_pengajuan', 20)->default('pending');
            $table->text('alasan_penolakan')->nullable();
            $table->unsignedBigInteger('id_users_peninjau')->nullable();
            $table->timestamp('ditinjau_pada')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_users_siswa')->references('id_users')->on('users');
            $table->foreign('id_paket_langganan_diminta')->references('id_paket_langganan')->on('paket_langganan');
            $table->foreign('id_lokasi_kolam_diminati')->references('id_lokasi_kolam')->on('lokasi_kolam');
            $table->foreign('id_users_peninjau')->references('id_users')->on('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengajuan_pendaftaran');
    }
};



