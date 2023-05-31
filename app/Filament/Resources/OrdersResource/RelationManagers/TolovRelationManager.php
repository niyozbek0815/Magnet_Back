<?php

namespace App\Filament\Resources\OrdersResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class TolovRelationManager extends RelationManager
{
    protected static string $relationship = 'tolov';

    protected static ?string $recordTitleAttribute = 'status';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()  ->schema([
                    Select::make('orders_id')->preload()
                    ->relationship('orders', 'id')->required(),
                    Forms\Components\TextInput::make('massa_tolov')->required(),
                    Forms\Components\TextInput::make('tolov')->required(),
                    Toggle::make('status')
                        ->required(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order_count')->sortable(),
                Tables\Columns\TextColumn::make('summa')->sortable(),
                Tables\Columns\IconColumn::make('status')->sortable()
                ->boolean(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
