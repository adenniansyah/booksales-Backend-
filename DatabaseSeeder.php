<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // <--- PENTING: Import User
use App\Models\Author;
use App\Models\Book;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. BUAT USER ADMIN (Wajib ada untuk tugas RBAC)
        User::create([
            'name' => 'Admin BookSales',
            'email' => 'admin@booksales.com',
            'password' => Hash::make('password123'),
            'role' => 'admin', 
        ]);

        // 2. BUAT USER BIASA (Opsional, untuk tes akses ditolak)
        User::create([
            'name' => 'User Biasa',
            'email' => 'user@booksales.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);

        // 3. DATA AUTHOR & BOOK (Kode asli Anda tetap di sini)
        $author1 = Author::create(['name' => 'Andrea Hirata', 'bio' => 'Penulis novel Laskar Pelangi.']);
        Book::create(['title' => 'Laskar Pelangi', 'isbn' => '978-979-1227-00-2', 'published_year' => 2005, 'author_id' => $author1->id]);

        $author2 = Author::create(['name' => 'J.K. Rowling', 'bio' => 'Penulis seri Harry Potter.']);
        Book::create(['title' => 'Harry Potter and the Philosopher\'s Stone', 'isbn' => '978-0-7475-3269-9', 'published_year' => 1997, 'author_id' => $author2->id]);
        
        // ... tambahkan data author/book lainnya jika perlu ...
    }
}