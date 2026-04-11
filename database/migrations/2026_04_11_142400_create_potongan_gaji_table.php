<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('potongan_gaji', function (Blueprint $table) {
            $table->unsignedBigInteger('id_potongan_gaji')->primary();
            $table->unsignedBigInteger('id_gaji_pelatih');
            $table->string('tipe_potongan', 30)->nullable();
            $table->text('deskripsi')->nullable();
            $table->decimal('nominal', 14, 2)->default(0);
            $table->unsignedBigInteger('id_users_pembuat');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_gaji_pelatih')->references('id_gaji_pelatih')->on('gaji_pelatih')->cascadeOnDelete();
            $table->foreign('id_users_pembuat')->references('id_users')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('potongan_gaji');
    }
};



