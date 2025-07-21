<?php

namespace App\Filament\Resources;

use App\Models\BookCopy;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Filament\Resources\BookCopyResource\Pages;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\BadgeColumn;

class BookCopyResource extends Resource
{
    protected static ?string $model = BookCopy::class;

    protected static ?string $navigationGroup = '📚Manajemen Buku';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $label = 'Eksemplar Buku';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('book_id')
                ->relationship('book', 'judul_buku')
                ->required()
                ->searchable(),

            Forms\Components\Select::make('status')
                ->options([
                    'tersedia' => 'Tersedia',
                    'dipinjam' => 'Dipinjam',
                    'dikembalikan' => 'Dikembalikan',
                ])
                ->default('tersedia')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('book.judul_buku')->label('Judul Buku')->sortable()->searchable(),
            BadgeColumn::make('status')
                ->colors([
                    'success' => 'tersedia',
                    'warning' => 'dipinjam',
                    'gray' => 'dikembalikan',
                ])
                ->label('Status')
                ->sortable(),
            Tables\Columns\TextColumn::make('created_at')->label('Dibuat')->dateTime()->sortable(),
        ])
        ->filters([])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookCopies::route('/'),
            'create' => Pages\CreateBookCopy::route('/create'),
            'edit' => Pages\EditBookCopy::route('/{record}/edit'),
        ];
    }

    public static function getPluralModelLabel(): string
    {
        return 'Eksemplar Buku';
    }
}
