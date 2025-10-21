<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'friska_kategoris';

    // Tambahkan user_id ke kolom yang bisa diisi
    protected $fillable = [
        'nama_kategori',
        'user_id',
    ];

    // Relasi: Kategori memiliki banyak TempatMakan
    public function tempatMakans()
    {
        return $this->hasMany(TempatMakan::class);
    }

    // Relasi: Kategori dimiliki oleh satu User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
