<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    // FUNGSI READ ALL DATA (GET)
    public function index()
    {
        $genres = Genre::all(); // Mengambil semua data dari DB
        
        return response()->json([
            'status' => 'success',
            'data' => $genres
        ], 200); // Status 200 OK
    }

    // FUNGSI CREATE DATA (POST)
    public function store(Request $request)
    {
        // Validasi input (Sesuai Modul Hal 13)
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Simpan ke Database (Mass Assignment - Sesuai Modul Hal 14)
        $genre = Genre::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Genre berhasil dibuat',
            'data' => $genre
        ], 201); // Status 201 Created
    }
}