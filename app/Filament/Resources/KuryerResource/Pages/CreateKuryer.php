<?php

namespace App\Filament\Resources\KuryerResource\Pages;

use App\Filament\Resources\KuryerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKuryer extends CreateRecord
{
    protected static string $resource = KuryerResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
