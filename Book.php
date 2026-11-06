<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model 
{
    protected $fillable = [
        'title',
        'isbn',
        'published_year',
        'author_id'
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    /**
     * Mengembalikan daftar semua book sebagai array statis.
     */
    public static function getAllData()
    {
        return [
            ['id' => 1, 'judul' => 'Harry Potter', 'penulis_id' => 1],
            ['id' => 2, 'judul' => 'Laskar Pelangi', 'penulis_id' => 3],
            ['id' => 3, 'judul' => 'Bumi Manusia', 'penulis_id' => 5],
            ['id' => 4, 'judul' => 'Filosofi Teras', 'penulis_id' => 4],
            ['id' => 5, 'judul' => 'Ada Apa Dengan Cinta?', 'penulis_id' => 2],
        ];
    }
}