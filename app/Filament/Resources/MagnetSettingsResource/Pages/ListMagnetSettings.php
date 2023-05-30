<?php

namespace App\Filament\Resources\MagnetSettingsResource\Pages;

use App\Filament\Resources\MagnetSettingsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMagnetSettings extends ListRecords
{
    protected static string $resource = MagnetSettingsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
