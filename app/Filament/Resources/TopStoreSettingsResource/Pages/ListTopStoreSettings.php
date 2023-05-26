<?php

namespace App\Filament\Resources\TopStoreSettingsResource\Pages;

use App\Filament\Resources\TopStoreSettingsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTopStoreSettings extends ListRecords
{
    protected static string $resource = TopStoreSettingsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
