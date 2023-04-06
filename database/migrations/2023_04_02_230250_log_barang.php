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
        Schema::create('log_barang', function (Blueprint $table) {
            $table->string('id_barang');
            $table->string('action');
            $table->integer('hargabeli');
            $table->integer('hargaeceran');
            $table->integer('hargaretail');
            $table->integer('stok');
            $table->timestamps();
        });
        DB::unprepared('
        CREATE TRIGGER log_insert_barang AFTER INSERT ON `barangs` FOR EACH ROW BEGIN INSERT INTO log_barang (`id_barang`, `action`, `hargabeli` ,
        `hargaeceran`, `hargaretail`,`stok`,  `created_at`,`updated_at`) 
        VALUES (NEW.id, "Insert", NEW.hargabeli,NEW.hargaeceran,NEW.hargaretail,NEW.stok, now(), null); END
        ');
        DB::unprepared('
        CREATE TRIGGER log_update_barang AFTER UPDATE ON `barangs` FOR EACH ROW BEGIN INSERT INTO log_barang (`id_barang`, `action`, `hargabeli` ,
        `hargaeceran`, `hargaretail`,`stok`,  `created_at`,`updated_at`) 
        VALUES (NEW.id, "UPDATE", NEW.hargabeli,NEW.hargaeceran,NEW.hargaretail,NEW.stok, now(), null); END
        ');
        DB::unprepared('
        CREATE TRIGGER log_delete_barang AFTER DELETE ON `barangs` FOR EACH ROW BEGIN INSERT INTO log_barang (`id_barang`, `action`, `hargabeli` ,
        `hargaeceran`, `hargaretail`,`stok`,  `created_at`,`updated_at`) 
        VALUES (old.id, "delete", old.hargabeli,old.hargaeceran,old.hargaretail,old.stok, now(), null); END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_barang');
        DB::unprepared('DROP TRIGGER IF EXISTS  log_insert_barang');
        DB::unprepared('DROP TRIGGER IF EXISTS  log_update_barang');
        DB::unprepared('DROP TRIGGER IF EXISTS  log_delete_barang');
    }
};
