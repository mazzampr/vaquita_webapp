<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('periode_gaji', function (Blueprint $table) {
            $table->unsignedBigInteger('id_periode_gaji')->primary();
            $table->date('mulai_periode');
            $table->date('akhir_periode');
            $table->string('status_periode', 20)->default('draft');
            $table->unsignedBigInteger('id_users_pembuat');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_users_pembuat')->references('id_users')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('periode_gaji');
    }
};



