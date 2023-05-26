<?php

namespace App\Filament\Resources\ClientAdresResource\Pages;

use App\Filament\Resources\ClientAdresResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClientAdres extends EditRecord
{
    protected static string $resource = ClientAdresResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
