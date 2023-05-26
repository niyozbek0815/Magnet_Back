<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use stdClass;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class AdressRelationManager extends RelationManager
{
    protected static string $relationship = 'adress';

    protected static ?string $recordTitleAttribute = 'viloyat';

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
                Tables\Columns\TextColumn::make('index')->getStateUsing(
                    static function (stdClass $rowLoop, HasTable $livewire): string {
                        return (string) (
                            $rowLoop->iteration +
                            ($livewire->tableRecordsPerPage * (
                                $livewire->page - 1
                            ))
                        );
                    }
                ),
                Tables\Columns\TextColumn::make('user.name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('viloyat')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('tuman')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('maxalla')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('pochta')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()->date('s:m:Y'),            ])
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
