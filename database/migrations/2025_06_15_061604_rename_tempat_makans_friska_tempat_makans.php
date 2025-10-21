<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::rename('tempat_makans', 'friska_tempat_makans');
    }

    public function down(): void
    {
        Schema::rename('friska_tempat_makans', 'tempat_makans');
    }
};
