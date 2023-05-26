<?php

namespace App\Filament\Resources\TopStoreSettingsResource\Pages;

use App\Filament\Resources\TopStoreSettingsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTopStoreSettings extends CreateRecord
{
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected static string $resource = TopStoreSettingsResource::class;
}
