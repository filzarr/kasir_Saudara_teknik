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
        Schema::create('detailtransaksis', function (Blueprint $table) {
            // $table->string('id');
            $table->string('id_transaksi');
            $table->foreign('id_transaksi')->references('id')->on('transaksis');
            $table->string('id_barang');
            $table->foreign('id_barang')->references('id')->on('barangs');

            $table->integer('harga_jual');
            $table->integer('modal');
            $table->integer('jumlah');
            $table->integer('subtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailtransaksis');
    }
};
