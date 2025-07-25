<?php

namespace App\Filament\Resources\LoanResource\Pages;

use Filament\Actions;
use App\Models\BookReturn;
use App\Models\BookCopy;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\LoanResource;

class EditLoan extends EditRecord
{
    protected static string $resource = LoanResource::class;

    protected function handleRecordUpdate(\Illuminate\Database\Eloquent\Model $record, array $data): \Illuminate\Database\Eloquent\Model
    {
        $loan = parent::handleRecordUpdate($record, $data);

        // Jika status diubah menjadi "dikembalikan"
        if ($loan->status === 'dikembalikan') {
            // Buat record pengembalian jika belum ada
            if (!$loan->return) {
                BookReturn::create([
                    'loan_id' => $loan->id,
                    'tanggal_pengembalian' => now(),
                    'status' => 'diterima',
                ]);
            }

            // Ubah semua eksemplar yang terkait menjadi 'tersedia' kembali
            BookCopy::where('loan_id', $loan->id)
                ->whereIn('status', ['dipinjam', 'dikembalikan'])
                ->update([
                    'status' => 'tersedia',
                    'loan_id' => null,
                ]);
        }

        return $loan;
    }
}
