<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Book;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BookResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BookResource\RelationManagers;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationGroup = '📚Manajemen Buku';
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('category_id')
                ->label('Kategori')
                ->relationship('category', 'nama_kategori')
                ->required(),

            Forms\Components\Select::make('rack_id')
                ->label('Rak')
                ->relationship('rack', 'nama_rak')
                ->required(),

            Forms\Components\TextInput::make('judul_buku')->required(),
            Forms\Components\TextInput::make('pengarang'),
            Forms\Components\TextInput::make('penerbit'),
            Forms\Components\TextInput::make('tahun_terbit'),
            // Forms\Components\TextInput::make('jumlah_eksemplar')->numeric()->default(1),
            Forms\Components\Textarea::make('deskripsi'),
            Forms\Components\FileUpload::make('cover_buku')->image()->directory('cover_buku')->visibility('public')->imagePreviewHeight('100'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul_buku')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('category.nama_kategori')->label('Kategori'),
                Tables\Columns\TextColumn::make('rack.nama_rak')->label('Rak'),
                Tables\Columns\TextColumn::make('pengarang'),
                Tables\Columns\TextColumn::make('penerbit'),
                Tables\Columns\TextColumn::make('tahun_terbit'),
                // Tables\Columns\TextColumn::make('jumlah_eksemplar'),
                Tables\Columns\ImageColumn::make('cover_buku')->label('Cover')
                ->circular()
                ->getStateUsing(fn($record) => asset('storage/' . $record->cover_buku))
                ->extraAttributes(['class' => 'cursor-pointer'])
                ->action(function ($record) {
                    // Menampilkan modal custom
                    \Filament\Notifications\Notification::make()
                        ->title('Preview Cover')
                        ->body('<img src="' . asset('storage/' . $record->cover_buku) . '" class="w-full rounded" />')
                        ->persistent()
                        ->success()
                        ->send();
                }),
            ])
            ->filters([
                SelectFilter::make('category_id')
                ->label('Kategori')
                ->relationship('category', 'nama_kategori')
                ->searchable(),
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
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }

    public static function getPluralModelLabel(): string
    {
        return 'Buku';
    }
}
