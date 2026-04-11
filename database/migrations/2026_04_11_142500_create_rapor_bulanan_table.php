<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rapor_bulanan', function (Blueprint $table) {
            $table->unsignedBigInteger('id_rapor_bulanan')->primary();
            $table->unsignedBigInteger('id_users_siswa');
            $table->unsignedBigInteger('id_users_pelatih');
            $table->string('bulan_rapor', 7);
            $table->string('level_awal', 10)->nullable();
            $table->string('level_akhir', 10)->nullable();
            $table->text('ringkasan')->nullable();
            $table->boolean('terkunci')->default(false);
            $table->timestamp('dikirim_pada')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_users_siswa')->references('id_users')->on('users');
            $table->foreign('id_users_pelatih')->references('id_users')->on('users');
            $table->unique(['id_users_siswa', 'bulan_rapor']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rapor_bulanan');
    }
};



