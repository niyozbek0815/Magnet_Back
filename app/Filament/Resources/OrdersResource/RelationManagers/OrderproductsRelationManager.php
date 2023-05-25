<?php

namespace App\Filament\Resources\OrdersResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class OrderproductsRelationManager extends RelationManager
{
    protected static string $relationship = 'orderproducts';

    protected static ?string $recordTitleAttribute = 'count';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('orders_id')->preload()
                ->relationship('orders', 'id')->required(),
                Select::make('products_id')->preload()
                ->relationship('products', 'name')->required(),

                Forms\Components\TextInput::make('sub_products_id')->nullable(),
            Forms\Components\TextInput::make('size_products_id')->nullable(),
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
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
