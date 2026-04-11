<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profil_pelatih', function (Blueprint $table) {
            $table->unsignedBigInteger('id_profil_pelatih')->primary();
            $table->unsignedBigInteger('id_users')->unique();
            $table->string('nomor_hp', 30)->nullable();
            $table->date('tanggal_bergabung')->nullable();
            $table->string('spesialisasi')->nullable();
            $table->string('tipe_gaji_dasar', 30)->nullable();
            $table->decimal('nominal_gaji_dasar', 14, 2)->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_users')->references('id_users')->on('users')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profil_pelatih');
    }
};



