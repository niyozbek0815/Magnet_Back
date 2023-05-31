<?php

namespace App\Filament\Resources;

use stdClass;
use Filament\Forms;
use Filament\Tables;
use App\Models\Orders;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\OrdersResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OrdersResource\RelationManagers;
use App\Filament\Resources\OrdersResource\RelationManagers\OrderproductsRelationManager;
use App\Filament\Resources\OrdersResource\RelationManagers\TolovRelationManager;

class OrdersResource extends Resource
{
    protected static ?string $model = Orders::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationGroup = 'Order Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('users_id')->preload()
                ->relationship('users', 'name')->required(),
                Select::make('status_id')->preload()
                ->relationship('status', 'name_uz')->required(),
                Select::make('adress_id')->preload()
                ->relationship('adress', 'viloyat')->required(),
                Forms\Components\TextInput::make('order_count')
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
                )->sortable(),
                Tables\Columns\TextColumn::make('id')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('users.name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('status.name_uz')->sortable(),
                Tables\Columns\TextColumn::make('adress.viloyat')->sortable(),
                Tables\Columns\TextColumn::make('order_count')->sortable(),
                Tables\Columns\TextColumn::make('tolov.tolov')->sortable()->label('Products tolov'),
                Tables\Columns\TextColumn::make('tolov.massa_tolov')->sortable()->label('Yetkazib berish'),

                Tables\Columns\IconColumn::make('tolov.status')->sortable()->label('Tolov statusi')
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
                ]),            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            OrderproductsRelationManager::class,
            TolovRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrders::route('/create'),
            'edit' => Pages\EditOrders::route('/{record}/edit'),
        ];
    }
}
