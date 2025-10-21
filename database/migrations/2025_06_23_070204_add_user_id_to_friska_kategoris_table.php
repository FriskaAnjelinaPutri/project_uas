<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('friska_kategoris', function (Blueprint $table) {
            if (!Schema::hasColumn('friska_kategoris', 'user_id')) {
                $table->unsignedBigInteger('user_id')->after('id');

                // Tambahkan relasi hanya jika belum ada
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            }
        });
    }

    public function down(): void
    {
        Schema::table('friska_kategoris', function (Blueprint $table) {
            if (Schema::hasColumn('friska_kategoris', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }
        });
    }
};
