<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BarangResource\Pages;
use App\Filament\Resources\BarangResource\RelationManagers;
use App\Models\Barang;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BarangResource extends Resource
{
    protected static ?string $model = Barang::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Kelola Barang';
    protected static ?string $slug = 'kelola-barang';
    protected static ?string $label = 'Kelola Barang';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_barang')
                    ->required()
                    ->label('Nama Barang')
                    ->placeholder('Masukkan Nama Barang'),
                TextInput::make('kode_barang')
                    ->required()
                    ->label('Kode Barang')
                    ->placeholder('Masukkan Nama Barang'),
                TextInput::make('harga_barang')
                    ->required()
                    ->numeric()
                    ->label('Harga Barang')
                    ->placeholder('Masukkan Nama Barang'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_barang')
                    ->sortable()
                    ->searchable()
                    ->label('Nama'),
                TextColumn::make('kode_barang')
                    ->copyable()
                    ->copyMessage('Berhasil Menyalin!')
                    ->label('Kode'),
                TextColumn::make('harga_barang')
                    ->label('Harga'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make() 
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
            'index' => Pages\ListBarangs::route('/'),
            'create' => Pages\CreateBarang::route('/create'),
            'edit' => Pages\EditBarang::route('/{record}/edit'),
        ];
    }
}
