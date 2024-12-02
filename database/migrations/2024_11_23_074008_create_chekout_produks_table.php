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
        Schema::create('chekout_produks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_genteng');
            $table->unsignedBigInteger('id_alamat');
            $table->integer('jumlah_barang');
            $table->enum('method_pembayaran',['transfer', 'cod']);
            $table->enum('pengantaran',['delivery', 'pickup']);
            $table->decimal('sub_total',10,2);
            $table->string('bukti_pembayaran')->nullable();
            $table->enum('status',['menunggu', 'gagal', 'sukses']);
            $table->enum('status_pengiriman',['dikemas', 'dikirim', 'ditetima']);

            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_genteng')->references('id')->on('gentengs');
            $table->foreign('id_alamat')->references('id')->on('alamats');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chekout_produks');
    }
};
