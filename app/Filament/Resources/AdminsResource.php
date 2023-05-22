<?php

namespace App\Filament\Resources;

use stdClass;
use Filament\Forms;
use Filament\Tables;
use App\Models\Admins;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Resources\Pages\Page;
use Filament\Forms\Components\Card;
use Illuminate\Support\Facades\Hash;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Forms\Components\CheckboxList;
use App\Filament\Resources\AdminsResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use App\Filament\Resources\AdminsResource\RelationManagers;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Resources\AdminsResource\RelationManagers\RolesRelationManager;
use App\Filament\Resources\RoleResource\RelationManagers\PermissionsRelationManager;

class AdminsResource extends Resource
{
    protected static ?string $model = Admins::class;

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
                    ->required(static fn(Page $livewire):string=>$livewire instanceof CreateAdmin)->minLength(7)
                    ->dehydrated(static fn(null|string $state):bool=>filled($state))
                    ->label(static fn(Page $livewire):string=>($livewire instanceof EditAdmin) ? 'New Password':'Password' ),

                    Forms\Components\TextInput::make('hudud')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('dastafka_status')
                        ->maxLength(255),
                    CheckboxList::make('roles')->relationship('roles','name')->columns(3)->helperText('Only Choise One')->required(),
                    Forms\Components\Toggle::make('is_admin')
                    ->required()->onColor('success')
                    ->offColor('danger')->onIcon('heroicon-s-lightning-bolt')
                    ->offIcon('heroicon-s-user'),
                    SpatieMediaLibraryFileUpload::make('images')                    ,

             ]) ]);
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
            Tables\Columns\TextColumn::make('email')->limit(10)->searchable()->sortable(),
            Tables\Columns\TextColumn::make('roles.name')->sortable()->searchable(),
            SpatieMediaLibraryImageColumn::make('images'),
            Tables\Columns\IconColumn::make('is_admin')->sortable()
                ->boolean(),
            Tables\Columns\TextColumn::make('phone')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('deleted_at')->sortable()->searchable()->dateTime('d:m:Y'),
            Tables\Columns\TextColumn::make('created_at')->sortable()->searchable()->dateTime('d:m:Y'),

        ])
        ->filters([
            TrashedFilter::make(),
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
            RolesRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAdmins::route('/'),
            'create' => Pages\CreateAdmins::route('/create'),
            'edit' => Pages\EditAdmins::route('/{record}/edit'),
        ];
    }
}
