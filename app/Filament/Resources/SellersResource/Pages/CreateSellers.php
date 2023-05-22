<?php

namespace App\Filament\Resources\SellersResource\Pages;

use App\Filament\Resources\SellersResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSellers extends CreateRecord
{
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected static string $resource = SellersResource::class;
}
