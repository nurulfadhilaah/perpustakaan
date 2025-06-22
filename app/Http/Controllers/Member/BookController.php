<?php

namespace App\Http\Controllers\Member;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('member.katalog', compact('books'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('member.detail-buku', compact('book'));
    }

    public function ajukanPinjam($id)
    {
        // Nanti kamu bisa tambah logika insert ke tabel peminjaman
        // Contoh sederhana:
        return back()->with('success', 'Pengajuan peminjaman telah dikirim.');
    }
}
