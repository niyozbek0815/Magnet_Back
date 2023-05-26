<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\ClientAdres;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ClientAdresResource\Pages;
use App\Filament\Resources\ClientAdresResource\RelationManagers;

class ClientAdresResource extends Resource
{
    protected static ?string $model = ClientAdres::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('users_id')->preload()->relationship('user','name'),
                Forms\Components\TextInput::make('viloyat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tuman')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('maxalla')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('pochta')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('viloyat'),
                Tables\Columns\TextColumn::make('tuman'),
                Tables\Columns\TextColumn::make('maxalla'),
                Tables\Columns\TextColumn::make('pochta'),
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
            'index' => Pages\ListClientAdres::route('/'),
            'create' => Pages\CreateClientAdres::route('/create'),
            'edit' => Pages\EditClientAdres::route('/{record}/edit'),
        ];
    }
}
