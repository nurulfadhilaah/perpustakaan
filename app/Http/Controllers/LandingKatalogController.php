<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class LandingKatalogController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->latest()->take(12)->get();
        return view('landing.katalog', compact('books'));
    }
}
