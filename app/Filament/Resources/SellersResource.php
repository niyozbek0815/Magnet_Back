<?php

namespace App\Filament\Resources;

use stdClass;
use Filament\Forms;
use Filament\Tables;
use App\Models\Sellers;
use Filament\Pages\Page;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Support\Facades\Hash;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TrashedFilter;
use App\Filament\Resources\SellersResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Resources\SellersResource\RelationManagers;
use App\Filament\Resources\SellersResource\Pages\EditSellers;
use App\Filament\Resources\SellersResource\Pages\CreateSellers;
use App\Filament\Resources\SellersResource\RelationManagers\StoreRelationManager;
use App\Filament\Resources\SellersResource\RelationManagers\StoresRelationManager;

class SellersResource extends Resource
{
    protected static ?string $model = Sellers::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('phone')
                    ->tel()->unique(ignoreRecord:true)
                    ->maxLength(255),
                    Forms\Components\TextInput::make('email')
                    ->email()->unique(ignoreRecord: true)
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                ->password()->dehydrateStateUsing(static fn(null|string $state):
                null|string=>
                filled($state) ? Hash::make($state):null,)
                ->required(static fn(Page $livewire):string=>$livewire instanceof CreateSellers)->minLength(7)
                ->dehydrated(static fn(null|string $state):bool=>filled($state))
                ->label(static fn(Page $livewire):string=>($livewire instanceof EditSellers) ? 'New Password':'Password' ),
                SpatieMediaLibraryFileUpload::make('images'),

                ])


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
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('email')->searchable()->sortable()->limit(10),
                SpatieMediaLibraryImageColumn::make('images'),
                Tables\Columns\TextColumn::make('phone')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('image'),
                Tables\Columns\TextColumn::make('created_at')->sortable()
                    ->dateTime()->date('d:m:Y'),
            ])
            ->filters([
                TrashedFilter::make()
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
            StoreRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSellers::route('/'),
            'create' => Pages\CreateSellers::route('/create'),
            'edit' => Pages\EditSellers::route('/{record}/edit'),
        ];
    }
}
