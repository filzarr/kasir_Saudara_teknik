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
        CREATE TRIGGER log_transaksi AFTER INSERT ON `transaksis` FOR EACH ROW BEGIN INSERT INTO log_transaksis (`id_transaksi`, `action`, `user_id` ,`created_at`, `updated_at`) 
        VALUES (NEW.id, "Insert", NEW.user_id, now(), null); END;
        CREATE TRIGGER log_update_transaksi AFTER UPDATE ON `transaksis` FOR EACH ROW BEGIN INSERT INTO log_transaksis (`id_transaksi`, `action`, `user_id` ,`created_at`, `updated_at`) 
        VALUES (NEW.id, "Update", NEW.user_id, now(), null); END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS `log_transaksi`');
        DB::unprepared('DROP TRIGGER IF EXISTS `log_update_transaksi`');
    }
};
