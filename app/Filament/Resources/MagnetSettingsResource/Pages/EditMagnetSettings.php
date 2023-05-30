<?php

namespace App\Filament\Resources\MagnetSettingsResource\Pages;

use App\Filament\Resources\MagnetSettingsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMagnetSettings extends EditRecord
{
    protected static string $resource = MagnetSettingsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
