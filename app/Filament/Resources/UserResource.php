<?php

namespace App\Filament\Resources;

use stdClass;
use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Pages\Page;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Hash;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TrashedFilter;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\Pages\EditUser;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Filament\Resources\UserResource\RelationManagers\AdressRelationManager;
use App\Filament\Resources\UserResource\RelationManagers\ClientAdresRelationManager;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Admin & User Management';

    public static function form(Form $form): Form
    {
        return $form
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
                SpatieMediaLibraryFileUpload::make('images'),

            Forms\Components\TextInput::make('password')
            ->password()->dehydrateStateUsing(static fn(null|string $state):
            null|string=>
            filled($state) ? Hash::make($state):null,)
            ->required(static fn(Page $livewire):string=>$livewire instanceof CreateUser)->minLength(7)
            ->dehydrated(static fn(null|string $state):bool=>filled($state))
            ->label(static fn(Page $livewire):string=>($livewire instanceof EditUser) ? 'New Password':'Password' ),

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
                SpatieMediaLibraryImageColumn::make('images'),
                Tables\Columns\TextColumn::make('email')->searchable()->sortable()->limit(10),
                Tables\Columns\TextColumn::make('phone')->searchable()->sortable(),
    Tables\Columns\TextColumn::make('created_at')->searchable()->sortable()
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
            AdressRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
