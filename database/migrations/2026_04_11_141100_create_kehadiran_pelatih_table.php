<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kehadiran_pelatih', function (Blueprint $table) {
            $table->unsignedBigInteger('id_kehadiran_pelatih')->primary();
            $table->unsignedBigInteger('id_sesi_kelas')->unique();
            $table->unsignedBigInteger('id_users_pelatih');
            $table->timestamp('cek_masuk_pada')->nullable();
            $table->decimal('cek_masuk_latitude', 10, 7)->nullable();
            $table->decimal('cek_masuk_longitude', 10, 7)->nullable();
            $table->boolean('terlambat')->default(false);
            $table->integer('menit_terlambat')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_sesi_kelas')->references('id_sesi_kelas')->on('sesi_kelas')->cascadeOnDelete();
            $table->foreign('id_users_pelatih')->references('id_users')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kehadiran_pelatih');
    }
};



