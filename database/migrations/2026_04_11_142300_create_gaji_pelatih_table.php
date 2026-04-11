<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gaji_pelatih', function (Blueprint $table) {
            $table->unsignedBigInteger('id_gaji_pelatih')->primary();
            $table->unsignedBigInteger('id_periode_gaji');
            $table->unsignedBigInteger('id_users_pelatih');
            $table->integer('jumlah_sesi')->default(0);
            $table->integer('jumlah_siswa')->default(0);
            $table->decimal('gaji_kotor', 14, 2)->default(0);
            $table->decimal('total_potongan', 14, 2)->default(0);
            $table->decimal('gaji_bersih', 14, 2)->default(0);
            $table->string('status_gaji', 20)->default('draft');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_periode_gaji')->references('id_periode_gaji')->on('periode_gaji');
            $table->foreign('id_users_pelatih')->references('id_users')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gaji_pelatih');
    }
};



