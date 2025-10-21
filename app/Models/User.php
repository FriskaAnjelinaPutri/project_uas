<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Kolom yang boleh diisi
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    // Kolom disembunyikan
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Cast kolom ke tipe tertentu
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relasi: User memiliki banyak TempatMakan
     */
    public function tempatMakans()
    {
        return $this->hasMany(TempatMakan::class, 'user_id');
    }
}
