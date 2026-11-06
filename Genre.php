<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    // WAJIB ADA INI AGAR BISA SIMPAN DATA VIA POSTMAN
    protected $fillable = [
        'name', 
    ];
}