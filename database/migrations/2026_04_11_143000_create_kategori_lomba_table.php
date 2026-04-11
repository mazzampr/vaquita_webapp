<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kategori_lomba', function (Blueprint $table) {
            $table->unsignedBigInteger('id_kategori_lomba')->primary();
            $table->unsignedBigInteger('id_event_lomba');
            $table->string('nama_kategori');
            $table->string('kelompok_usia')->nullable();
            $table->integer('jarak_meter')->nullable();
            $table->string('gaya_renang')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_event_lomba')->references('id_event_lomba')->on('event_lomba')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kategori_lomba');
    }
};



