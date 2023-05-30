<?php

namespace App\Filament\Resources\KuryerDistrictResource\Pages;

use App\Filament\Resources\KuryerDistrictResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKuryerDistrict extends EditRecord
{
    protected static string $resource = KuryerDistrictResource::class;

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
