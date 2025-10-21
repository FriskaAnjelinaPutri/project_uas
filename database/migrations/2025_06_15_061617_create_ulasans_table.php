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
        Schema::create('ulasans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tempat_makan_id')->constrained('friska_tempat_makans')->onDelete('cascade');
            $table->string('nama_pengulas');
            $table->integer('rating'); // dari 1 sampai 5
            $table->text('komentar');
            $table->timestamp('tanggal_ulasan')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasans');
    }
};
