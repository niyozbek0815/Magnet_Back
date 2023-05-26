<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TopProductSettingsResource\Pages;
use App\Filament\Resources\TopProductSettingsResource\RelationManagers;
use App\Models\TopProductSettings;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TopProductSettingsResource extends Resource
{
    protected static ?string $model = TopProductSettings::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('start')
                    ->required(),
                Forms\Components\TextInput::make('stop')
                    ->required(),
                Forms\Components\TextInput::make('name_uz')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name_kr')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name_en')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name_ru')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('summa')
                    ->required(),
                Forms\Components\TextInput::make('continuity')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('start'),
                Tables\Columns\TextColumn::make('stop'),
                Tables\Columns\TextColumn::make('name_uz'),
                Tables\Columns\TextColumn::make('name_kr'),
                Tables\Columns\TextColumn::make('name_en'),
                Tables\Columns\TextColumn::make('name_ru'),
                Tables\Columns\TextColumn::make('summa'),
                Tables\Columns\TextColumn::make('continuity'),
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
            'index' => Pages\ListTopProductSettings::route('/'),
            'create' => Pages\CreateTopProductSettings::route('/create'),
            'edit' => Pages\EditTopProductSettings::route('/{record}/edit'),
        ];
    }    
}
