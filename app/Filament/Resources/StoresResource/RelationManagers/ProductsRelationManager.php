<?php

namespace App\Filament\Resources\StoresResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use stdClass;

class ProductsRelationManager extends RelationManager
{
    protected static string $relationship = 'products';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                    SpatieMediaLibraryFileUpload::make('images')->multiple() ->maxFiles(5),
                    Select::make('categories_id')->preload()->relationship('categories','name_uz')->required(),
                    Select::make('stores_id')->preload()->relationship('stores','name')->required(),
                    Forms\Components\TextInput::make('price')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('sale')
                    ->required()
                    ->maxLength(255),
         
                ]),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index')->label('№')->getStateUsing(
                    static function (stdClass $rowLoop, HasTable $livewire): string {
                        return (string) (
                            $rowLoop->iteration +
                            ($livewire->tableRecordsPerPage * (
                                $livewire->page - 1
                            ))
                        );
                    }
                )->sortable(),
                Tables\Columns\TextColumn::make('id')->label('Product ID')->sortable(),
                Tables\Columns\TextColumn::make('name'),
                SpatieMediaLibraryImageColumn::make('images'),
                Tables\Columns\TextColumn::make('categories.name_uz')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('stores.name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\TextColumn::make('sale'),
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
