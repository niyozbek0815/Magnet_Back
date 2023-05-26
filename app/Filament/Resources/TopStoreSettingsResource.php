<?php

namespace App\Filament\Resources;

use stdClass;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\TopStoreSettings;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TopStoreSettingsResource\Pages;
use App\Filament\Resources\TopStoreSettingsResource\RelationManagers;

class TopStoreSettingsResource extends Resource
{
    protected static ?string $model = TopStoreSettings::class;

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
            'index' => Pages\ListTopStoreSettings::route('/'),
            'create' => Pages\CreateTopStoreSettings::route('/create'),
            'edit' => Pages\EditTopStoreSettings::route('/{record}/edit'),
        ];
    }
}
