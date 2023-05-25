<?php

namespace App\Filament\Resources\StoresResource\Pages;

use App\Filament\Resources\StoresResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStores extends ListRecords
{
    protected static string $resource = StoresResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
