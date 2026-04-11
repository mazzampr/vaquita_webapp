<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('paket_langganan', function (Blueprint $table) {
            $table->unsignedBigInteger('id_paket_langganan')->primary();
            $table->string('nama_paket');
            $table->string('tipe_paket', 30);
            $table->string('level', 10)->nullable();
            $table->integer('kuota_sesi')->default(0);
            $table->integer('durasi_hari')->default(0);
            $table->decimal('harga', 14, 2)->default(0);
            $table->boolean('aktif')->default(true)->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('paket_langganan');
    }
};



