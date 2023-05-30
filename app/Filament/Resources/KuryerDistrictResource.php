<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KuryerDistrictResource\Pages;
use App\Filament\Resources\KuryerDistrictResource\RelationManagers;
use App\Models\Kuryer;
use App\Models\KuryerDistrict;
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

class KuryerDistrictResource extends Resource
{
    protected static ?string $model = KuryerDistrict::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()->schema([
                Select::make('kuryer_id')
                        ->label('Kuryer ID')
                        ->options(Kuryer::all()->pluck('name', 'id'))
                        ->searchable(),

                Forms\Components\TextInput::make('region')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('district')
                    ->maxLength(255)
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
                Tables\Columns\TextColumn::make('region')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('district')->searchable()->sortable()
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
            'index' => Pages\ListKuryerDistricts::route('/'),
            'create' => Pages\CreateKuryerDistrict::route('/create'),
            'edit' => Pages\EditKuryerDistrict::route('/{record}/edit'),
        ];
    }    
}
