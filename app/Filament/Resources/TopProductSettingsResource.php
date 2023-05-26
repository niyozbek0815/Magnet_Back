<?php

namespace App\Filament\Resources;

use stdClass;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use App\Models\TopProductSettings;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TopProductSettingsResource\Pages;
use App\Filament\Resources\TopProductSettingsResource\RelationManagers;

class TopProductSettingsResource extends Resource
{
    protected static ?string $model = TopProductSettings::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static ?string $navigationGroup = 'Settings Management';

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
                TextColumn::make('index')->label('№')->getStateUsing(
                    static function (stdClass $rowLoop, HasTable $livewire): string {
                        return (string) (
                            $rowLoop->iteration +
                            ($livewire->tableRecordsPerPage * (
                                $livewire->page - 1
                            ))
                        );
                    }
                ),
                Tables\Columns\TextColumn::make('name_uz')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('start')->sortable(),
                Tables\Columns\TextColumn::make('stop')->sortable(),
                Tables\Columns\TextColumn::make('summa')->sortable(),
                Tables\Columns\TextColumn::make('continuity')->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()->date('d:m:Y'),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),            ])
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
