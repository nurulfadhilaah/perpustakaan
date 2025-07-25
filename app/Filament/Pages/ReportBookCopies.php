<?php

namespace App\Filament\Pages;

use App\Models\Book;
use Filament\Forms;
use Filament\Pages\Page;
use Filament\Forms\Form;
use Illuminate\Support\Collection;
use App\Models\BookReturn;


class ReportBookCopies extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.pages.report-book-copies';
    protected static ?string $navigationGroup = '📊 Laporan';
    protected static ?string $title = 'Laporan Eksemplar Buku';

    public ?string $startDate = null;
    public ?string $endDate = null;

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\DatePicker::make('startDate')->label('Tanggal Mulai')->required(),
            Forms\Components\DatePicker::make('endDate')->label('Tanggal Akhir')->required(),
        ]);
    }

    public function getFilteredBooks(): Collection
    {
        $books = Book::with('copies.loan.return')->get();

        return $books->map(function ($book) {
            $copies = $book->copies;

            $total = $copies->whereBetween('updated_at', [$this->startDate, $this->endDate])->count();

            $tersedia = $copies->where('status', 'tersedia')
                ->whereBetween('updated_at', [$this->startDate, $this->endDate])->count();

            $dipinjam = $copies->where('status', 'dipinjam')
                ->whereBetween('updated_at', [$this->startDate, $this->endDate])->count();

            // Hitung dikembalikan berdasarkan data BookReturn
            $dikembalikan = BookReturn::whereHas('loan', function ($query) use ($book) {
                $query->where('book_id', $book->id);
            })
            ->whereBetween('tanggal_pengembalian', [$this->startDate, $this->endDate])
            ->count();

            return (object)[
                'book' => $book,
                'total' => $total,
                'tersedia' => $tersedia,
                'dipinjam' => $dipinjam,
                'dikembalikan' => $dikembalikan,
            ];
        });
    }

}
