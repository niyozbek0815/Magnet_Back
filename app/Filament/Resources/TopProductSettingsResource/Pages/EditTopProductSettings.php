<?php

namespace App\Filament\Resources\TopProductSettingsResource\Pages;

use App\Filament\Resources\TopProductSettingsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTopProductSettings extends EditRecord
{
    protected static string $resource = TopProductSettingsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
