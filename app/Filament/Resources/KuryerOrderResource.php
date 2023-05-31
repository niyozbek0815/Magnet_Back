<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KuryerOrderResource\Pages;
use App\Filament\Resources\KuryerOrderResource\RelationManagers;
use App\Models\KuryerOrder;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use stdClass;

class KuryerOrderResource extends Resource
{
    protected static ?string $model = KuryerOrder::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Kuryer Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Select::make('kuryer_id')->preload()->relationship('kuryer','name')->required(),
                    Select::make('order_id')->preload()->relationship('order','id')->required(),
                    Select::make('address_id')->preload()->relationship('address','viloyat')->required(),
                    TextInput::make('count')
                    ->reactive()
                    ->required(),
                    Toggle::make('status'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('Index')->label('№')->getStateUsing(
                    static function (stdClass $rowLoop, HasTable $livewire): string {
                        return (string) (
                            $rowLoop->iteration +
                            ($livewire->tableRecordsPerPage * (
                                $livewire->page - 1
                            ))
                        );
                    }
                ),
                Tables\Columns\TextColumn::make('kuryer.name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('order.id')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('address.viloyat')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('count')->searchable()->sortable(),
                ToggleColumn::make('status'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListKuryerOrders::route('/'),
            'create' => Pages\CreateKuryerOrder::route('/create'),
            'edit' => Pages\EditKuryerOrder::route('/{record}/edit'),
        ];
    }    
}
