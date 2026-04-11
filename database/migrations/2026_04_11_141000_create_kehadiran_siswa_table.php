<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kehadiran_siswa', function (Blueprint $table) {
            $table->unsignedBigInteger('id_kehadiran_siswa')->primary();
            $table->unsignedBigInteger('id_sesi_kelas');
            $table->unsignedBigInteger('id_users_siswa');
            $table->string('status_kehadiran', 20);
            $table->timestamp('cek_masuk_pada')->nullable();
            $table->decimal('cek_masuk_latitude', 10, 7)->nullable();
            $table->decimal('cek_masuk_longitude', 10, 7)->nullable();
            $table->unsignedBigInteger('id_users_pelatih_pemeriksa')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_sesi_kelas')->references('id_sesi_kelas')->on('sesi_kelas')->cascadeOnDelete();
            $table->foreign('id_users_siswa')->references('id_users')->on('users');
            $table->foreign('id_users_pelatih_pemeriksa')->references('id_users')->on('users')->nullOnDelete();
            $table->unique(['id_sesi_kelas', 'id_users_siswa']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kehadiran_siswa');
    }
};



