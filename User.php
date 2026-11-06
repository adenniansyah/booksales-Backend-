<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// Import JWTSubject sesuai Modul Hal. 15
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'username', // ✅ WAJIB DITAMBAHKAN AGAR REGISTER BERHASIL
        'password',
        'role',     // Untuk RBAC
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Method wajib JWT (Modul Hal. 15)
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}