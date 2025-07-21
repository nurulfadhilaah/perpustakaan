<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCopy;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberLoanController extends Controller
{
    public function ajukan($bookId)
    {
        $member = Auth::guard('member')->user();
        $book   = Book::findOrFail($bookId);

        /* ====== 1. CEK EKSEMPLAR TERSEDIA ====== */
        $eksemplarTersedia = $book->copies()->where('status', 'tersedia')->count();
        if ($eksemplarTersedia < 1) {
            return back()->with('error', 'Buku ini sedang tidak tersedia.');
        }

        /* ====== 2. CEK APAKAH MASIH PUNYA LOAN AKTIF UNTUK BUKU YANG SAMA ====== */
        $adaLoanAktif = Loan::where('member_id', $member->id)
            ->where('book_id',  $book->id)
            ->whereIn('status', ['pending', 'dipinjam'])
            ->exists();

        if ($adaLoanAktif) {
            return back()->with('error', 'Anda sudah mengajukan atau sedang meminjam buku ini.');
        }

        /* ====== 3. BUAT LOAN BARU STATUS PENDING ====== */
        Loan::create([
            'member_id'       => $member->id,
            'book_id'         => $book->id,
            'tanggal_pinjam'  => now(),
            'tanggal_kembali' => now()->addDays(7),
            'status'          => 'pending',     // disetujui admin → status dipinjam & eksemplar berubah
        ]);

        return back()->with('success', 'Peminjaman berhasil diajukan, silakan tunggu konfirmasi dari admin.');
    }
}

