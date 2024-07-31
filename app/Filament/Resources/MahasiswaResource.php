<?php

namespace App\Filament\Resources;

use App\Models\Mahasiswa;
use App\Filament\Resources\MahasiswaResource\Pages;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class MahasiswaResource extends Resource
{
    protected static ?string $model = Mahasiswa::class; // ?string tipe data diubah ke nullable string

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nama'),
                TextColumn::make('email')->label('Email'),
                TextColumn::make('created_at')->label('Tanggal Registrasi')->dateTime(),
            ])
            ->filters([
                // Tambahkan filter jika diperlukan
            ])
            ->actions([]) // Tidak ada aksi (CRUD)
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMahasiswas::route('/'),
        ];
    }
}
