<?php

namespace App\Filament\Resources\BookReturnResource\Pages;

use App\Filament\Resources\BookReturnResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBookReturns extends ListRecords
{
    protected static string $resource = BookReturnResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
