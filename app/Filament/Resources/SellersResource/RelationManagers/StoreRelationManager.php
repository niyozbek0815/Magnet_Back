<?php

namespace App\Filament\Resources\SellersResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class StoreRelationManager extends RelationManager
{
    protected static string $relationship = 'store';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                Select::make('sellers_id')->preload()
                ->relationship('sellers', 'name')->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('viloyat')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tuman')
                    ->maxLength(255),
                Forms\Components\TextInput::make('maxalla')
                    ->maxLength(255),
                Forms\Components\TextInput::make('contact1')->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('contact2')->tel()
                    ->maxLength(255),
                SpatieMediaLibraryFileUpload::make('images')->collection('images'),
                SpatieMediaLibraryFileUpload::make('logos')->collection('logo'),
                ]),
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
