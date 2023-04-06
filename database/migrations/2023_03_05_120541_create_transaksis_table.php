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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->uuid('kodefaktut');
            $table->string('nama');
            $table->string('alamat');
            $table->enum('jenispembayaran', ['tunai', 'non-tunai','belum-dibayar']);
            $table->date('jatuh_tempo')->nullable();
            $table->integer('pembayaran')->nullable();
            $table->string('user_id');
            $table->integer('kembalian')->nullable();
            $table->string('total');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
