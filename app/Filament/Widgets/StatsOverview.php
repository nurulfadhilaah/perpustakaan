<?php

namespace App\Filament\Widgets;

use App\Models\Book;
use App\Models\Loan;
use App\Models\BookCopy;
use App\Models\BookReturn;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Eksemplar', BookCopy::count())
                ->description('Jumlah seluruh eksemplar buku')
                ->icon('heroicon-o-rectangle-stack')
                ->color('success')
                ->url(route('filament.admin.resources.book-copies.index')),

            Card::make('Total Buku', Book::count())
                ->description('Jumlah judul buku yang tersedia')
                ->icon('heroicon-o-book-open')
                ->color('primary')
                ->url(route('filament.admin.resources.books.index')),

            Card::make('Total Peminjaman', Loan::count())
                ->description('Jumlah transaksi peminjaman buku')
                ->icon('heroicon-o-arrow-down-tray')
                ->color('info')
                ->url(route('filament.admin.resources.loans.index')),

            Card::make('Total Pengembalian', BookReturn::count())
                ->description('Jumlah pengembalian buku')
                ->icon('heroicon-o-arrow-up-tray')
                ->color('warning')
                ->url(route('filament.admin.resources.book-returns.index')),
        ];
    }
}
