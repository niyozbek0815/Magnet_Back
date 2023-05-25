<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderProductsResource\Pages;
use App\Filament\Resources\OrderProductsResource\RelationManagers;
use App\Models\OrderProducts;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderProductsResource extends Resource
{
    protected static ?string $model = OrderProducts::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('orders_id')
                    ->required(),
                Forms\Components\TextInput::make('products_id')
                    ->required(),
                Forms\Components\TextInput::make('sub_product_id'),
                Forms\Components\TextInput::make('size_products_id'),
                Forms\Components\TextInput::make('price')
                    ->required(),
                Forms\Components\TextInput::make('count')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('orders_id'),
                Tables\Columns\TextColumn::make('products_id'),
                Tables\Columns\TextColumn::make('sub_product_id'),
                Tables\Columns\TextColumn::make('size_products_id'),
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\TextColumn::make('count'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListOrderProducts::route('/'),
            'create' => Pages\CreateOrderProducts::route('/create'),
            'edit' => Pages\EditOrderProducts::route('/{record}/edit'),
        ];
    }
}
