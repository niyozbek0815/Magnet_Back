<?php

namespace App\Filament\Resources;

use stdClass;
use Filament\Forms;
use Filament\Tables;
use App\Models\TopProduct;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TopProductResource\Pages;
use App\Filament\Resources\TopProductResource\RelationManagers;

class TopProductResource extends Resource
{
    protected static ?string $model = TopProduct::class;

    protected static ?string $navigationIcon = 'heroicon-o-view-grid';

    protected static ?string $navigationGroup = 'Category & Product Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('products_id')->preload()->relationship('products','name'),
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
                Tables\Columns\TextColumn::make('products.name'),
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
            'index' => Pages\ListTopProducts::route('/'),
            'create' => Pages\CreateTopProduct::route('/create'),
            'edit' => Pages\EditTopProduct::route('/{record}/edit'),
        ];
    }
}
