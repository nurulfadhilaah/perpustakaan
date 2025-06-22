<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function detail($id)
    {
        $book = Book::with('category')->findOrFail($id);
        return view('member.detail', compact('book'));
    }

}
