<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KuryerResource\Pages;
use App\Filament\Resources\KuryerResource\RelationManagers;
use App\Filament\Resources\SellersResource\Pages\CreateSellers;
use App\Filament\Resources\SellersResource\Pages\EditSellers;
use App\Models\Kuryer;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Toggle;
use Filament\Pages\Page;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;
use stdClass;

class KuryerResource extends Resource
{
    protected static ?string $model = Kuryer::class;

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

                    Forms\Components\TextInput::make('password')
                    ->password()->dehydrateStateUsing(static fn(null|string $state):
                    null|string=>
                    filled($state) ? Hash::make($state):null,)
                    ->required(static fn(Page $livewire):string=>$livewire instanceof CreateSellers)->minLength(7)
                    ->dehydrated(static fn(null|string $state):bool=>filled($state))
                    ->label(static fn(Page $livewire):string=>($livewire instanceof EditSellers) ? 'New Password':'Password' ),

                    Toggle::make('is_status')
    
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
                ),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('phone')->searchable()->sortable(),
                ToggleColumn::make('is_status')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\deleteAction::make(),
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
            'index' => Pages\ListKuryers::route('/'),
            'create' => Pages\CreateKuryer::route('/create'),
            'edit' => Pages\EditKuryer::route('/{record}/edit'),
        ];
    }    
}
