<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('keranjang_produks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_genteng');
            $table->integer('total_produk');
            $table->integer('sub_total');

            $table->foreign('id_genteng')->references('id')->on('gentengs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keranjang_produks');
    }
};
