<?php

namespace App\Filament\Resources\StoresResource\Pages;

use App\Filament\Resources\StoresResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStores extends CreateRecord
{
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected static string $resource = StoresResource::class;
}
