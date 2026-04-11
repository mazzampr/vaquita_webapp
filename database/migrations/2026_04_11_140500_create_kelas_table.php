<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_kelas')->primary();
            $table->unsignedBigInteger('id_paket_langganan');
            $table->string('nama_kelas');
            $table->string('tipe_kelas', 30);
            $table->string('level', 10)->nullable();
            $table->integer('kapasitas')->default(0);
            $table->unsignedBigInteger('id_lokasi_kolam');
            $table->unsignedBigInteger('id_users_pelatih');
            $table->boolean('aktif')->default(true)->index();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_paket_langganan')->references('id_paket_langganan')->on('paket_langganan');
            $table->foreign('id_lokasi_kolam')->references('id_lokasi_kolam')->on('lokasi_kolam');
            $table->foreign('id_users_pelatih')->references('id_users')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};



