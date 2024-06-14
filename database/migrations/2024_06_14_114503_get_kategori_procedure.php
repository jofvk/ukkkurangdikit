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
        CREATE PROCEDURE getKategoriById(
            IN _id TINYINT
        )
        BEGIN
            SELECT id, deskripsi, kat 
            FROM vKategori
            WHERE id LIKE CONCAT("%", _id, "%");
        END
    ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS getKategoriById');
    }
};
