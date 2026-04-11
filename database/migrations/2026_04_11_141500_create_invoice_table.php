<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->unsignedBigInteger('id_invoice')->primary();
            $table->string('nomor_invoice')->unique();
            $table->unsignedBigInteger('id_users_siswa')->nullable();
            $table->unsignedBigInteger('id_grup_keluarga')->nullable();
            $table->unsignedBigInteger('id_langganan_siswa')->nullable();
            $table->date('tanggal_invoice');
            $table->date('jatuh_tempo')->nullable();
            $table->decimal('subtotal', 14, 2)->default(0);
            $table->decimal('diskon', 14, 2)->default(0);
            $table->decimal('total_tagihan', 14, 2)->default(0);
            $table->string('status_invoice', 20)->default('pending');
            $table->unsignedBigInteger('id_users_pembuat');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_users_siswa')->references('id_users')->on('users')->nullOnDelete();
            $table->foreign('id_grup_keluarga')->references('id_grup_keluarga')->on('grup_keluarga')->nullOnDelete();
            $table->foreign('id_langganan_siswa')->references('id_langganan_siswa')->on('langganan_siswa')->nullOnDelete();
            $table->foreign('id_users_pembuat')->references('id_users')->on('users');
            $table->index(['status_invoice', 'jatuh_tempo']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoice');
    }
};



