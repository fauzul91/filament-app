<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use App\Models\CustomerModel;
use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use PhpParser\Node\Stmt\Label;

class CustomerResource extends Resource
{
    protected static ?string $model = CustomerModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationLabel = 'Kelola Customer';
    protected static ?string $slug = 'kelola-customer';
    protected static ?string $navigationGroup = 'Kelola';
    protected static ?string $label = 'Kelola Customer';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_customer')
                    ->required()
                    ->label('Nama')
                    ->placeholder('Masukkan Nama Customer'),
                TextInput::make('kode_customer') 
                    ->required()
                    ->label('Kode')
                    ->placeholder('Masukkan Kode Customer'),
                TextInput::make('alamat_customer') 
                    ->required()
                    ->label('Alamat')
                    ->placeholder('Masukkan Alamat Customer'),
                TextInput::make('telepon_customer') 
                    ->required()
                    ->numeric()
                    ->label('Telepon')
                    ->placeholder('Masukkan Telepon Customer'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_customer')
                    ->label('Nama')
                    ->sortable(),
                TextColumn::make('kode_customer')
                    ->label('Kode'),
                TextColumn::make('alamat_customer')
                    ->label('Alamat'),
                TextColumn::make('telepon_customer') 
                    ->label('Telepon')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
