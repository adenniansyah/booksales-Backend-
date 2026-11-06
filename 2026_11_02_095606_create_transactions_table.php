<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            // Kolom order_number unik sesuai soal no. 1
            $table->string('order_number')->unique(); 
            
            // Relasi Foreign Key ke tabel users (sebagai customer)
            // 'foreignId' otomatis membuat unsignedBigInteger dan index
            $table->foreignId('customer_id')->constrained('users')->onDelete('cascade');
            
            // Relasi Foreign Key ke tabel books
            $table->foreignId('book_id')->constrained('books')->onDelete('cascade');
            
            // Tipe data Decimal sesuai soal no. 2
            $table->decimal('total_amount', 10, 2); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};