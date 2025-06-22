<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberLoanController extends Controller
{
    public function ajukan($bookId)
{
    $member = Auth::guard('member')->user();
    $book = Book::findOrFail($bookId);

    // Cek apakah stok tersedia
    if ($book->jumlah_eksemplar < 1) {
        return back()->with('error', 'Buku ini sedang tidak tersedia.');
    }

    // Cek apakah masih ada pinjaman aktif untuk buku ini yang belum dikembalikan
    $loanAktif = Loan::where('member_id', $member->id)
        ->where('book_id', $book->id)
        ->where(function ($query) {
            $query->where('status', 'dipinjam')
                ->orWhere('status', 'pending');
        })
        ->whereDoesntHave('return', function ($query) {
            $query->where('status', 'diterima');
        })
        ->exists();

    if ($loanAktif) {
        return back()->with('error', 'Anda sudah mengajukan atau sedang meminjam buku ini.');
    }

    // Simpan peminjaman dengan status pending
    Loan::create([
        'member_id'        => $member->id,
        'book_id'          => $book->id,
        'tanggal_pinjam'   => now(),
        'tanggal_kembali'  => now()->addDays(7),
        'status'           => 'pending',
        'admin_id'         => null, // Diisi saat konfirmasi admin
    ]);

    return back()->with('success', 'Peminjaman berhasil diajukan, silakan tunggu konfirmasi dari admin.');
}

}
