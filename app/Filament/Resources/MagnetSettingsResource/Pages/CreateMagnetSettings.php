<?php

namespace App\Filament\Resources\MagnetSettingsResource\Pages;

use App\Filament\Resources\MagnetSettingsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMagnetSettings extends CreateRecord
{
    protected static string $resource = MagnetSettingsResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
