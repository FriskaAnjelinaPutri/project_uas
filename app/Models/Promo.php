<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $table = 'friska_promos';

    protected $fillable = [
        'judul_promo',
        'deskripsi_promo',
        'mulai_promo',
        'akhir_promo',
        'tempat_makan_id',
        'user_id',
    ];

    // Relasi ke tempat makan
    public function tempatMakan()
    {
        return $this->belongsTo(TempatMakan::class, 'tempat_makan_id');
    }

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
