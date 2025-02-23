<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;

class HomeController extends Controller
{
    public function index()
    {
        $data = Book::all(); // Ambil semua data buku
        return view('home.index', compact('data')); // Kirim ke view
    }
}
