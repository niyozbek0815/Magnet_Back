<?php

namespace App\Filament\Resources;

use stdClass;
use Filament\Forms;
use Filament\Tables;
use App\Models\Products;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProductsResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Resources\ProductsResource\RelationManagers;
use App\Filament\Resources\ProductsResource\RelationManagers\SubproductsRelationManager;
use App\Filament\Resources\ProductsResource\RelationManagers\SizeproductsRelationManager;

class ProductsResource extends Resource
{
    protected static ?string $model = Products::class;

    protected static ?string $navigationIcon = 'heroicon-o-view-grid';

    protected static ?string $navigationGroup = 'Category & Product Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Select::make('categories_id')->preload()->relationship('categories','name_uz')->required(),
                    Select::make('stores_id')->preload()->relationship('stores','name')->required(),

                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Textarea::make('description'),
                    Forms\Components\TextInput::make('price')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('sale')->label('Chegirma')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('count')->default(0)
                        ->maxLength(255),
                    Forms\Components\TextInput::make('count_review')->default(0)
                        ->maxLength(255),
                    Forms\Components\TextInput::make('stars')->default(0)
                        ->maxLength(255),
                SpatieMediaLibraryFileUpload::make('images')->multiple() ->maxFiles(5),

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
                )->sortable(),
                SpatieMediaLibraryImageColumn::make('images'),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('categories.name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('stores.name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\TextColumn::make('sale'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()->date("d:m:Y"),

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
            SubproductsRelationManager::class,
            SizeproductsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProducts::route('/create'),
            'edit' => Pages\EditProducts::route('/{record}/edit'),
        ];
    }
}
