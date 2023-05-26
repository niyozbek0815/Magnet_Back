<?php

namespace App\Filament\Resources\TopStoreResource\Pages;

use App\Filament\Resources\TopStoreResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTopStores extends ListRecords
{
    protected static string $resource = TopStoreResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
