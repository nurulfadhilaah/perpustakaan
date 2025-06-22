<?php

namespace App\Filament\Resources;


use Illuminate\Support\Facades\Hash;
use Filament\Forms;
use Filament\Tables;
use App\Models\Member;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\MemberResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MemberResource\RelationManagers;

class MemberResource extends Resource
{
    protected static ?string $model = Member::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = '👤Member Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_anggota')->label('Nama Lengkap')->required(),
                Forms\Components\TextInput::make('nik')->required()->unique(ignoreRecord: true)->label('NIK'),
                Forms\Components\TextInput::make('no_anggota')->required()->label('No. Anggota'),
                Forms\Components\Textarea::make('alamat')->required(),
                Forms\Components\TextInput::make('no_hp')->label('No.HP'),
                Forms\Components\TextInput::make('email')->email()->required(),
                Forms\Components\DatePicker::make('tgl_lahir')->label('Tanggal Lahir'),
                // Forms\Components\TextInput::make('password')
                //     ->password()
                //     ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                //     ->required()->dehydrated(fn ($state) => filled($state)),
                Forms\Components\FileUpload::make('foto')->image()->disk('public')->directory('foto_member')->visibility('public')->imagePreviewHeight('100'),
                 Forms\Components\FileUpload::make('ktp')->image()->disk('public')->directory('ktp_member')->visibility('public')->imagePreviewHeight('100'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_anggota')->searchable(),
                Tables\Columns\TextColumn::make('nik')->sortable()->searchable()->label('NIK'),
                Tables\Columns\TextColumn::make('no_anggota')->sortable()->label('No.Anggota'),
                Tables\Columns\TextColumn::make('email')->sortable(),
                Tables\Columns\TextColumn::make('no_hp')->label('No.HP'),
                Tables\Columns\ImageColumn::make('foto')->disk('public')->circular(),
                Tables\Columns\ImageColumn::make('ktp')->disk('public')->circular()->label('KTP'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->label('Registered At')->sortable(),

            ])
            ->filters([
                Tables\Filters\Filter::make('Tanpa Nomor Anggota')
                ->label('Belum Ada No Anggota')
                ->query(fn (Builder $query) => $query->whereNull('no_anggota')),
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
            'index' => Pages\ListMembers::route('/'),
            'create' => Pages\CreateMember::route('/create'),
            'edit' => Pages\EditMember::route('/{record}/edit'),
        ];
    }
}
