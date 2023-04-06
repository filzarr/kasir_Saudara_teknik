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
        Schema::create('barangs', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nama');
            $table->string('satuan');
            $table->integer('hargabeli');
            $table->string('id_kategori');
            $table->foreign('id_kategori')->references('id')->on('kategoribarangs');
            $table->integer('minimstok');
            $table->integer('hargaeceran');
            $table->integer('hargagrosir');
            $table->integer('hargaretail');
            $table->integer('stok');
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
