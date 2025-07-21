<?php

namespace App\Filament\Pages;

use App\Models\Book;
use Filament\Forms;
use Filament\Pages\Page;
use Filament\Forms\Form;
use Illuminate\Support\Collection;

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
        if (!$this->startDate || !$this->endDate) {
            return collect();
        }

        return Book::withCount([
            'copies as total' => fn ($q) => $q->whereBetween('created_at', [$this->startDate, $this->endDate]),
            'copies as tersedia_count' => fn ($q) => $q->where('status', 'tersedia')->whereBetween('created_at', [$this->startDate, $this->endDate]),
            'copies as dipinjam_count' => fn ($q) => $q->where('status', 'dipinjam')->whereBetween('created_at', [$this->startDate, $this->endDate]),
            'copies as dikembalikan_count' => fn ($q) => $q->where('status', 'dikembalikan')->whereBetween('created_at', [$this->startDate, $this->endDate]),
        ])->get();
    }
}
