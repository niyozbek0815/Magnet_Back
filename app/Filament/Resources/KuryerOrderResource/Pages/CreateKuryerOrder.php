<?php

namespace App\Filament\Resources\KuryerOrderResource\Pages;

use App\Filament\Resources\KuryerOrderResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKuryerOrder extends CreateRecord
{
    protected static string $resource = KuryerOrderResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
