<?php

namespace App\Filament\Resources\KuryerDistrictResource\Pages;

use App\Filament\Resources\KuryerDistrictResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKuryerDistricts extends ListRecords
{
    protected static string $resource = KuryerDistrictResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
