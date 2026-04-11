<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pembayaran')->primary();
            $table->unsignedBigInteger('id_invoice');
            $table->string('metode_pembayaran', 50)->nullable();
            $table->decimal('nominal', 14, 2)->default(0);
            $table->timestamp('tanggal_bayar')->nullable();
            $table->string('bukti_bayar_path')->nullable();
            $table->string('status_verifikasi', 20)->default('pending');
            $table->unsignedBigInteger('id_users_verifikator')->nullable();
            $table->timestamp('diverifikasi_pada')->nullable();
            $table->text('alasan_tolak')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_invoice')->references('id_invoice')->on('invoice')->cascadeOnDelete();
            $table->foreign('id_users_verifikator')->references('id_users')->on('users')->nullOnDelete();
            $table->index(['status_verifikasi', 'tanggal_bayar']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};



