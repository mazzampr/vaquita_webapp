<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('item_invoice', function (Blueprint $table) {
            $table->unsignedBigInteger('id_item_invoice')->primary();
            $table->unsignedBigInteger('id_invoice');
            $table->string('tipe_item', 50)->nullable();
            $table->text('deskripsi')->nullable();
            $table->integer('jumlah')->default(1);
            $table->decimal('harga_satuan', 14, 2)->default(0);
            $table->decimal('total_baris', 14, 2)->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_invoice')->references('id_invoice')->on('invoice')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('item_invoice');
    }
};



