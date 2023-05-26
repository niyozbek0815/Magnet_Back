<?php

namespace App\Filament\Resources;

use Str;
use Closure;
use Filament\Forms;
use Filament\Tables;
use App\Models\Category;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CategoryResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Filament\Resources\CategoryResource\RelationManagers\CategoriesRelationManager;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Category & Product Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('parent_id')
                ->relationship('parents', 'name_uz')  ->nullable(),
                Forms\Components\TextInput::make('name_uz')
                    ->required()->autofocus()->reactive()
                    ->afterStateUpdated(function (Closure $set, $state) {
                        $set('slug', \Str::slug($state));
                    })
                    ->maxLength(255),
                Forms\Components\TextInput::make('name_kr')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name_ru')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name_en')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                    SpatieMediaLibraryFileUpload::make('images'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('№')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('name_uz')->searchable()->sortable(),
                SpatieMediaLibraryImageColumn::make('images'),
                Tables\Columns\TextColumn::make('parents.id')->searchable()->sortable(),
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
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
