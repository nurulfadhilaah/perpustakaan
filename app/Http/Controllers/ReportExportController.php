<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\BookReturn;
use Barryvdh\DomPDF\Facade\Pdf;


class ReportExportController extends Controller
{
    public function exportPdf(Request $request)
    {
        $startDate = $request->query('startDate');
        $endDate = $request->query('endDate');

        $loans = Loan::with(['member', 'book'])
            ->whereBetween('tanggal_pinjam', [$startDate, $endDate])
            ->get();

        $returns = BookReturn::with(['loan.member', 'loan.book'])
            ->whereBetween('tanggal_pengembalian', [$startDate, $endDate])
            ->get();

        $pdf = PDF::loadView('exports.report-pdf', compact('startDate', 'endDate', 'loans', 'returns'))
                 ->setPaper('A4', 'landscape');

        return $pdf->download('laporan-perpustakaan.pdf');
        
    }
}
