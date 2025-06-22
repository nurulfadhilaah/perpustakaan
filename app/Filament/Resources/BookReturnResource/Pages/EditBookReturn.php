<?php

namespace App\Filament\Resources\BookReturnResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Notifications\PengembalianDisetujui;
use App\Filament\Resources\BookReturnResource;

class EditBookReturn extends EditRecord
{
    protected static string $resource = BookReturnResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $bookReturn = $this->record;

        if ($bookReturn->status !== 'diterima' && $data['status'] === 'diterima') {
            $bookReturn->loan->member->notify(new PengembalianDisetujui());
        }

        return $data;
    }
}
