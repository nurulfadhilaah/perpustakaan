<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\BookReturn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberRiwayatController extends Controller
{
    public function index()
    {
        $loans = Loan::with(['book', 'return'])
            ->where('member_id', Auth::guard('member')->id())
            ->whereIn('status', ['dipinjam', 'dikembalikan'])
            ->latest()
            ->get();

        return view('member.riwayat', compact('loans'));
    }

    public function ajukanPengembalian(Loan $loan)
    {
        // Cek apakah ini milik member yg sedang login
        if ($loan->member_id !== Auth::guard('member')->id()) {
            abort(403);
        }

        // Hindari pengajuan ganda
        if ($loan->return) {
            return back()->with('info', 'Pengembalian sudah diajukan.');
        }

        BookReturn::create([
            'loan_id' => $loan->id,
            'tanggal_pengembalian' => now(),
            'status' => 'pending',
        ]);

        return back()->with('success', 'Pengajuan pengembalian berhasil dikirim. Silakan tunggu konfirmasi admin.');
    }
}

