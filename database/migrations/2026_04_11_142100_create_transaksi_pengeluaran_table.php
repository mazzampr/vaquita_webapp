<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksi_pengeluaran', function (Blueprint $table) {
            $table->unsignedBigInteger('id_transaksi_pengeluaran')->primary();
            $table->unsignedBigInteger('id_kategori_pengeluaran');
            $table->decimal('nominal', 14, 2)->default(0);
            $table->date('tanggal_transaksi');
            $table->unsignedBigInteger('id_lokasi_kolam')->nullable();
            $table->text('catatan')->nullable();
            $table->unsignedBigInteger('id_users_pembuat');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_kategori_pengeluaran')->references('id_kategori_pengeluaran')->on('kategori_pengeluaran');
            $table->foreign('id_lokasi_kolam')->references('id_lokasi_kolam')->on('lokasi_kolam')->nullOnDelete();
            $table->foreign('id_users_pembuat')->references('id_users')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksi_pengeluaran');
    }
};



