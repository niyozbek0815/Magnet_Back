<?php

namespace App\Filament\Resources\TopProductSettingsResource\Pages;

use App\Filament\Resources\TopProductSettingsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTopProductSettings extends CreateRecord
{
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected static string $resource = TopProductSettingsResource::class;
}
