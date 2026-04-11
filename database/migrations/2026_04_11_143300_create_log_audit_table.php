<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('log_audit', function (Blueprint $table) {
            $table->unsignedBigInteger('id_log_audit')->primary();
            $table->unsignedBigInteger('id_users');
            $table->string('aksi');
            $table->string('entitas_tipe');
            $table->unsignedBigInteger('entitas_id')->nullable();
            $table->json('nilai_lama')->nullable();
            $table->json('nilai_baru')->nullable();
            $table->string('alamat_ip', 45)->nullable();
            $table->text('agen_pengguna')->nullable();
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('id_users')->references('id_users')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('log_audit');
    }
};



