<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sesi_kelas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_sesi_kelas')->primary();
            $table->unsignedBigInteger('id_kelas');
            $table->date('tanggal_sesi');
            $table->timestamp('mulai_pada')->nullable();
            $table->timestamp('selesai_pada')->nullable();
            $table->unsignedBigInteger('id_lokasi_kolam');
            $table->unsignedBigInteger('id_users_pelatih');
            $table->string('status_sesi', 30)->default('terjadwal');
            $table->text('catatan')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_kelas')->references('id_kelas')->on('kelas')->cascadeOnDelete();
            $table->foreign('id_lokasi_kolam')->references('id_lokasi_kolam')->on('lokasi_kolam');
            $table->foreign('id_users_pelatih')->references('id_users')->on('users');
            $table->index(['id_kelas', 'tanggal_sesi']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sesi_kelas');
    }
};



