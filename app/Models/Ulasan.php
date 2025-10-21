<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;

    protected $table = 'friska_ulasans';

    protected $fillable = [
        'tempat_makan_id',
        'nama_pengulas',
        'rating',
        'komentar',
        'tanggal_ulasan',
    ];

    public function tempatMakan()
    {
        return $this->belongsTo(TempatMakan::class);
    }
}
