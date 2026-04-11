<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('log_status_pengguna', function (Blueprint $table) {
            $table->unsignedBigInteger('id_log_status_pengguna')->primary();
            $table->unsignedBigInteger('id_users');
            $table->string('status_sebelum')->nullable();
            $table->string('status_sesudah')->nullable();
            $table->text('alasan')->nullable();
            $table->unsignedBigInteger('id_users_pengubah')->nullable();
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('id_users')->references('id_users')->on('users')->cascadeOnDelete();
            $table->foreign('id_users_pengubah')->references('id_users')->on('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('log_status_pengguna');
    }
};



