<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportBookCopyReportController extends Controller
{
    public function export(Request $request)
    {
        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $books = Book::withCount([
            // Total eksemplar berdasarkan tanggal input
            'copies as total' => fn ($q) => $q->whereBetween('created_at', [$startDate, $endDate]),

            // Status berdasarkan real-time (tidak perlu filter created_at)
            'copies as tersedia_count' => fn ($q) => $q->where('status', 'tersedia'),
            'copies as dipinjam_count' => fn ($q) => $q->where('status', 'dipinjam'),
            'copies as dikembalikan_count' => fn ($q) => $q->where('status', 'dikembalikan'),
        ])->get();

        $pdf = Pdf::loadView('exports.book-copy-report-filtered', compact('books', 'startDate', 'endDate'))
            ->setPaper('A4', 'portrait');

        return $pdf->download('laporan-eksemplar-buku.pdf');
    }

}
