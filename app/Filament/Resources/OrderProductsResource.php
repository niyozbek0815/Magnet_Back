<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use App\Models\OrderProducts;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OrderProductsResource\Pages;
use App\Filament\Resources\OrderProductsResource\RelationManagers;

class OrderProductsResource extends Resource
{
    protected static ?string $model = OrderProducts::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('orders_id')->preload()
                ->relationship('orders', 'id')->required(),
                Select::make('products_id')->preload()
                ->relationship('products', 'name')->required(),

                Forms\Components\TextInput::make('sub_product_id')->nullable(),
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
            Tables\Columns\TextColumn::make('orders.users.name')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('products.name')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('sizeproducts.name')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('subproducts.name')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('price')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('count')->searchable()->sortable(),
        ])
        ->filters([
            //
        ])

        ->actions([
            ActionGroup::make([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]),
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
