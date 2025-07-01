<?php

namespace App\Filament\Widgets;

use App\Models\Book;
use App\Models\Loan;
use App\Models\BookReturn;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Buku', Book::count())
                ->description('Jumlah seluruh buku yang tersedia')
                ->color('success')
                ->icon('heroicon-o-book-open')
                ->url(route('filament.admin.resources.books.index')),

            Card::make('Total Peminjaman', Loan::count())
                ->description('Total transaksi peminjaman')
                ->color('info')
                ->icon('heroicon-o-arrow-down-tray')
                ->url(route('filament.admin.resources.loans.index')),

            Card::make('Total Pengembalian', BookReturn::count())
                ->description('Jumlah buku yang dikembalikan')
                ->color('warning')
                ->icon('heroicon-o-arrow-up-tray')
                ->url(route('filament.admin.resources.book-returns.index')),
        ];
    }
}
