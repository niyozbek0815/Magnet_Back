<?php

namespace App\Filament\Resources\TopStoresResource\Pages;

use App\Filament\Resources\TopStoresResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTopStores extends EditRecord
{
    protected static string $resource = TopStoresResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
