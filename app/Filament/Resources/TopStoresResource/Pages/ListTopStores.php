<?php

namespace App\Filament\Resources\TopStoresResource\Pages;

use App\Filament\Resources\TopStoresResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTopStores extends ListRecords
{
    protected static string $resource = TopStoresResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
