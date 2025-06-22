<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookCategory;

class MemberKatalogController extends Controller
{
    public function index(Request $request)
    {
        $kategoriList = BookCategory::all();

        $books = Book::with('category')
            ->when($request->search, fn($query, $search) => 
                $query->where('judul_buku', 'like', "%$search%")
            )
            ->when($request->kategori, fn($query, $kategoriId) => 
                $query->where('category_id', $kategoriId)
            )
            ->latest()
            ->get();

        return view('member.katalog', compact('books', 'kategoriList'));
    }

    public function detail($id)
    {
        $book = Book::with('category')->findOrFail($id);
        return view('member.detail', compact('book'));
    }
}

