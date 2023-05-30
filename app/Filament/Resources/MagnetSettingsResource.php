<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MagnetSettingsResource\Pages;
use App\Filament\Resources\MagnetSettingsResource\RelationManagers;
use App\Models\MagnetSetting;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use stdClass;

class MagnetSettingsResource extends Resource
{
    protected static ?string $model = MagnetSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    TextInput::make('tashkent_dastavka')
                    ->reactive()
                    ->afterStateUpdated(function (Closure $set, $state) {
                        $set('slug', Str::slug($state));
                    })->required(),

                    TextInput::make('region_dastavka')
                                ->required()
                                ->maxLength(255),

                    TextInput::make('product_percentage')
                                ->required()
                                ->maxLength(255),
    
                ])
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
                Tables\Columns\TextColumn::make('tashkent_dastavka')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('region_dastavka')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('product_percentage')->searchable()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListMagnetSettings::route('/'),
            'create' => Pages\CreateMagnetSettings::route('/create'),
            'edit' => Pages\EditMagnetSettings::route('/{record}/edit'),
        ];
    }    
}
