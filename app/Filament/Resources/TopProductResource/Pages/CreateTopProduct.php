<?php

namespace App\Filament\Resources\TopProductResource\Pages;

use App\Filament\Resources\TopProductResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTopProduct extends CreateRecord
{
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected static string $resource = TopProductResource::class;
}
