<?php

namespace App\Filament\Resources\StoresResource\Pages;

use App\Filament\Resources\StoresResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStores extends EditRecord
{
    protected static string $resource = StoresResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
