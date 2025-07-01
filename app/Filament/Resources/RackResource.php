<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RackResource\Pages;
use App\Filament\Resources\RackResource\RelationManagers;
use App\Models\Rack;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RackResource extends Resource
{
    protected static ?string $model = Rack::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationGroup = '📚Manajemen Buku';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kode_rak')->required()->label('Kode Rak'),
                Forms\Components\TextInput::make('nama_rak')->required()->label('Nama Rak'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode_rak')->searchable(),
                Tables\Columns\TextColumn::make('nama_rak')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRacks::route('/'),
            'create' => Pages\CreateRack::route('/create'),
            'edit' => Pages\EditRack::route('/{record}/edit'),
        ];
    }

    public static function getPluralModelLabel(): string
    {
        return 'Rak Buku';
    }
}
