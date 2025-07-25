<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookReturn;
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

            // Real-time status
            'copies as tersedia_count' => fn ($q) => $q->where('status', 'tersedia'),
            'copies as dipinjam_count' => fn ($q) => $q->where('status', 'dipinjam'),
        ])->get();

        // Hitung jumlah dikembalikan berdasarkan BookReturn (bukan status copy)
        foreach ($books as $book) {
            $book->dikembalikan_count = BookReturn::whereHas('loan', function ($query) use ($book) {
                    $query->where('book_id', $book->id);
                })
                ->whereBetween('tanggal_pengembalian', [$startDate, $endDate])
                ->count(); // Atau sum('jumlah_dikembalikan') jika jumlahnya bisa lebih dari satu
        }

        $pdf = Pdf::loadView('exports.book-copy-report-filtered', compact('books', 'startDate', 'endDate'))
            ->setPaper('A4', 'portrait');

        return $pdf->download('laporan-eksemplar-buku.pdf');
    }
}
