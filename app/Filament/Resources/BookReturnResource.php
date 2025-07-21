<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookReturnResource\Pages;
use App\Filament\Resources\BookReturnResource\RelationManagers;
use App\Models\BookReturn;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookReturnResource extends Resource
{
    protected static ?string $model = BookReturn::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-up-on-square';
    protected static ?string $navigationGroup = '📝Manajemen Peminjaman dan Pengembalian';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('loan_id')
                ->relationship('loan', 'id') // tampilkan id atau bisa sesuaikan
                ->searchable()
                ->required(),
                Forms\Components\DatePicker::make('tanggal_pengembalian')->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'diterima' => 'Diterima',
                        'ditolak' => 'Ditolak',
                    ])
                    ->default('pending')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('loan.member.nama_anggota')->label('Nama Anggota'),
                Tables\Columns\TextColumn::make('loan.book.judul_buku')->label('Judul Buku'),
                Tables\Columns\TextColumn::make('tanggal_pengembalian')->date(),
                Tables\Columns\TextColumn::make('status')
                ->label('Status')
                ->formatStateUsing(fn ($state) => ucfirst($state))
                ->badge()
                ->color(fn ($state) => match ($state) {
                    'pending'   => 'warning',
                    'diterima'  => 'success',
                    'ditolak'   => 'danger',
                    default     => 'gray',
                }),
                Tables\Columns\SelectColumn::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'diterima' => 'Diterima',
                        'ditolak' => 'Ditolak',
                    ])
                   ->afterStateUpdated(function ($record, $state) {
                        if ($state === 'diterima') {
                            $record->load('loan.copy'); // pastikan relasi loan->copy dimuat

                            // Update status peminjaman
                            $record->loan->update([
                                'status' => now()->greaterThan($record->loan->tanggal_kembali)
                                    ? 'terlambat'
                                    : 'dikembalikan',
                            ]);

                            // Ubah status eksemplar menjadi "dikembalikan"
                            if ($record->loan->copy) {
                                $record->loan->copy->update([
                                    'status' => 'tersedia',
                                ]);
                            }
                        }

                        \Filament\Notifications\Notification::make()
                            ->title('Status berhasil diperbarui')
                            ->body("Status pengembalian diubah menjadi: " . ucfirst($state))
                            ->success()
                            ->send();
                    })
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
            'index' => Pages\ListBookReturns::route('/'),
            'create' => Pages\CreateBookReturn::route('/create'),
            'edit' => Pages\EditBookReturn::route('/{record}/edit'),
        ];
    }

    public static function getPluralModelLabel(): string
    {
        return 'Pengembalian';
    }
}
