<?php

namespace App\Filament\Resources\KuryerDistrictResource\Pages;

use App\Filament\Resources\KuryerDistrictResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKuryerDistrict extends CreateRecord
{
    protected static string $resource = KuryerDistrictResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
