<?php

namespace App\Filament\Resources\AppStartResource\Pages;

use App\Filament\Resources\AppStartResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAppStart extends CreateRecord
{
    protected static string $resource = AppStartResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
