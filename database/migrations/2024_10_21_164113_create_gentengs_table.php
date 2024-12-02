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
        Schema::create('gentengs', function (Blueprint $table) {
            $table->id();
            $table->string('gambar');
            $table->string('nama_genteng');
            $table->string('nama_perusahaan');
            $table->decimal('harga',10,2);
            $table->text('deskripsi');
            $table->string('panjang_genteng');
            $table->string('lebar_genteng');
            $table->string('tebal_genteng');
            $table->string('warna_genteng');
            $table->string('bahan_pembuatan');
            $table->string('stok');

            $table->unsignedBigInteger('id_kategori');
            $table->foreign('id_kategori')->references('id')->on('kategori_produks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gentengs');
    }
};
