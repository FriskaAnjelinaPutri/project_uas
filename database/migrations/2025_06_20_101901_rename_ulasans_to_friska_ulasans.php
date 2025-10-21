<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Rename dari tabel lama ke nama baru
        Schema::rename('ulasans', 'friska_ulasans');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Kembalikan nama tabel ke semula
        Schema::rename('friska_ulasans', 'ulasans');
    }
};
