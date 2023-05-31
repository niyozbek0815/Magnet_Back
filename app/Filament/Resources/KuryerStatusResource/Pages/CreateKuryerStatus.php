<?php

namespace App\Filament\Resources\KuryerStatusResource\Pages;

use App\Filament\Resources\KuryerStatusResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKuryerStatus extends CreateRecord
{
    protected static string $resource = KuryerStatusResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
