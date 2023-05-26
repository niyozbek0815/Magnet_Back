<?php

namespace App\Filament\Resources;

use stdClass;
use Filament\Forms;
use Filament\Tables;
use App\Models\Stores;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\StoresResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use App\Filament\Resources\StoresResource\RelationManagers;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class StoresResource extends Resource
{
    protected static ?string $model = Stores::class;

    protected static ?string $navigationIcon = 'heroicon-o-view-list';

    protected static ?string $navigationGroup = 'Stores Management';

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
                SpatieMediaLibraryImageColumn::make('logos')->collection('logo'),
                Tables\Columns\TextColumn::make('sellers.name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('viloyat')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('tuman')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('created_at')->sortable()
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
                ]),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStores::route('/'),
            'create' => Pages\CreateStores::route('/create'),
            'edit' => Pages\EditStores::route('/{record}/edit'),
        ];
    }
}
