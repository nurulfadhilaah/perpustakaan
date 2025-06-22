<?php

namespace App\Filament\Pages;

use App\Models\Loan;
use App\Models\BookReturn;
use Filament\Forms;
use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Forms\Components\DatePicker;

class Report extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.pages.report';
    protected static ?string $navigationGroup = '📊 Library Report';

    public ?string $startDate = null;
    public ?string $endDate = null;


    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            DatePicker::make('startDate')->label('Dari Tanggal')->required(),
            DatePicker::make('endDate')->label('Sampai Tanggal')->required(),
        ])->statePath('');
    }

    public function getLoanData()
    {
        if (!$this->startDate || !$this->endDate) {
            return collect();
        }

        return Loan::with(['member', 'book'])
            ->whereBetween('tanggal_pinjam', [$this->startDate, $this->endDate])
            ->get();
    }

    public function getReturnData()
    {
        if (!$this->startDate || !$this->endDate) {
            return collect();
        }

        return BookReturn::with(['loan.member', 'loan.book'])
            ->whereBetween('tanggal_pengembalian', [$this->startDate, $this->endDate])
            ->get();
    }
}