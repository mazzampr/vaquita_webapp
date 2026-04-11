<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('event_lomba', function (Blueprint $table) {
            $table->unsignedBigInteger('id_event_lomba')->primary();
            $table->string('nama_event');
            $table->date('tanggal_event');
            $table->string('lokasi_event')->nullable();
            $table->text('deskripsi')->nullable();
            $table->unsignedBigInteger('id_users_pembuat');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_users_pembuat')->references('id_users')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_lomba');
    }
};



