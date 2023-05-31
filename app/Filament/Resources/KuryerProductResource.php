<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KuryerProductResource\Pages;
use App\Filament\Resources\KuryerProductResource\RelationManagers;
use App\Models\KuryerProduct;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use stdClass;

class KuryerProductResource extends Resource
{
    protected static ?string $model = KuryerProduct::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Kuryer Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Select::make('kuryer_id')->preload()->relationship('kuryer','name')->required(),
                    Select::make('product_id')->preload()->relationship('product','name')->required(),
                    Select::make('order_id')->preload()->relationship('order','id')->required(),
                    Select::make('store_id')->preload()->relationship('store','name')->required(),
                    Select::make('status_id')->preload()->relationship('status','name_uz')->required(),
                    Select::make('order_product_id')->preload()->relationship('order_product','id')->required(),
                    Select::make('sub_product_id')->preload()->relationship('sub_product','name')->required(),
                    Select::make('size_product_id')->preload()->relationship('size_product','size')->required(),
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
                )->sortable(),
                Tables\Columns\TextColumn::make('kuryer.name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('product.name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('order.id')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('store.name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('status.name_uz')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('order_product.id')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('sub_product.name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('size_product.size')->searchable()->sortable(),
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
            'index' => Pages\ListKuryerProducts::route('/'),
            'create' => Pages\CreateKuryerProduct::route('/create'),
            'edit' => Pages\EditKuryerProduct::route('/{record}/edit'),
        ];
    }    
}
