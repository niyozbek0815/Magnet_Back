<?php

namespace App\Filament\Resources\KuryerProductResource\Pages;

use App\Filament\Resources\KuryerProductResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKuryerProduct extends CreateRecord
{
    protected static string $resource = KuryerProductResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
