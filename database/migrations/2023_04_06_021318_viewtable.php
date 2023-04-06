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
        DB::unprepared('
        CREATE VIEW barang_minim_stok AS select `kasir`.`barangs`.`id` AS `id`,`kasir`.`barangs`.`nama` AS `nama`,
        `kasir`.`barangs`.`satuan` AS `satuan`,`kasir`.`barangs`.`hargabeli` AS `hargabeli`,`kasir`.`barangs`.
        `hargaeceran` AS `hargaeceran`,`kasir`.`barangs`.`hargagrosir` AS `hargagrosir`,`kasir`.`barangs`.`hargaretail` AS `hargaretail`
        ,`kasir`.`barangs`.`stok` AS `stok`,`kasir`.`barangs`.`gambar` AS `gambar`,`kasir`.`barangs`.`created_at` AS `created_at`,
        `kasir`.`barangs`.`updated_at` AS `updated_at` from `kasir`.`barangs` where `kasir`.`barangs`.`stok` <= "10"');
        DB::unprepared('
        CREATE VIEW stoksikit AS select `kasir`.`barangs`.`id` AS `id`,`kasir`.`barangs`.`nama` AS `nama`,`kasir`.`barangs`.`satuan` AS `satuan`,`kasir`.`barangs`.`hargabeli` AS `hargabeli`,`kasir`.`barangs`.`id_kategori` AS `id_kategori`,`kasir`.`barangs`.`minimstok` AS `minimstok`,`kasir`.`barangs`.`hargaeceran` AS `hargaeceran`,`kasir`.`barangs`.`hargagrosir` AS `hargagrosir`,`kasir`.`barangs`.`hargaretail` AS `hargaretail`,`kasir`.`barangs`.`stok` AS `stok`,`kasir`.`barangs`.`gambar` AS `gambar`,`kasir`.`barangs`.`created_at` AS `created_at`,`kasir`.`barangs`.`updated_at` AS `updated_at` from `kasir`.`barangs` where `kasir`.`barangs`.`minimstok` >= `kasir`.`barangs`.`stok`');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP IF EXISTS `barang_minim_stok`');
        DB::unprepared('DROP IF EXISTS `stoksikit`');
    }
};
