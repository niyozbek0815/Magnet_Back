<?php

namespace App\Filament\Resources\TopStoreResource\Pages;

use App\Filament\Resources\TopStoreResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTopStore extends CreateRecord
{
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected static string $resource = TopStoreResource::class;
}
