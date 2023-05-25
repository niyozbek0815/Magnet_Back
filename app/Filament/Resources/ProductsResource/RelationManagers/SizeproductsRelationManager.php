<?php

namespace App\Filament\Resources\ProductsResource\RelationManagers;

use stdClass;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Filament\Resources\RelationManagers\RelationManager;

class SizeproductsRelationManager extends RelationManager
{
    protected static string $relationship = 'sizeproducts';

    protected static ?string $recordTitleAttribute = 'size';

    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                Card::make()->schema([
                    Select::make('products_id')->preload()->relationship('products','name')->required(),
                Forms\Components\TextInput::make('size')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('price')
                    ->maxLength(255),])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index')->getStateUsing(
                    static function (stdClass $rowLoop, HasTable $livewire): string {
                        return (string) (
                            $rowLoop->iteration +
                            ($livewire->tableRecordsPerPage * (
                                $livewire->page - 1
                            ))
                        );
                    }
                ),
                Tables\Columns\TextColumn::make('size'),
                Tables\Columns\TextColumn::make('price'),

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
