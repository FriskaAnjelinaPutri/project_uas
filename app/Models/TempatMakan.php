<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatMakan extends Model
{
    use HasFactory;

    protected $table = 'friska_tempat_makans';

    protected $fillable = [
        'nama_tempat',
        'deskripsi',
        'alamat',
        'jam_buka',
        'jam_tutup',
        'no_telepon',
        'kategori_id',
        'user_id',
        'gambar'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
