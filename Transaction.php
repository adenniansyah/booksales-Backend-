<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * Sesuai Soal No. 5 & 17: Menentukan kolom yang dapat diisi secara massal
     */
    protected $fillable = [
        'order_number',
        'customer_id',
        'book_id',
        'total_amount'
    ];

    /**
     * Relasi ke Customer (User)
     * Sesuai Soal No. 6: Foreign key menghubungkan transaction ke customers/users
     */
    public function customer()
    {
        // Asumsi tabel user Anda bernama 'users' (bawaan Laravel)
        return $this->belongsTo(User::class, 'customer_id');
    }

    /**
     * Relasi ke Book
     * Mengambil data buku berdasarkan book_id
     */
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}