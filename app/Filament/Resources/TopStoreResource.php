<?php

namespace App\Filament\Resources;

use stdClass;
use Filament\Forms;
use Filament\Tables;
use App\Models\TopStore;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\TopStoreResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TopStoreResource\RelationManagers;

class TopStoreResource extends Resource
{
    protected static ?string $model = TopStore::class;

    protected static ?string $navigationIcon = 'heroicon-o-sort-ascending';

    protected static ?string $navigationGroup = 'Stores Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('stores_id')->preload()->relationship('stores','name'),
                Select::make('top_type')->preload()->relationship('type','name_uz'),
                Forms\Components\Toggle::make('tolov')
                    ->required(),
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
                Tables\Columns\TextColumn::make('stores.name'),
                Tables\Columns\TextColumn::make('type.name_uz'),
                Tables\Columns\IconColumn::make('tolov')
                    ->boolean(),
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
                ]),             ])
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
            'index' => Pages\ListTopStores::route('/'),
            'create' => Pages\CreateTopStore::route('/create'),
            'edit' => Pages\EditTopStore::route('/{record}/edit'),
        ];
    }
}
