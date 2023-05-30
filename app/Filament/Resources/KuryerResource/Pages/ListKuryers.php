<?php

namespace App\Filament\Resources\KuryerResource\Pages;

use App\Filament\Resources\KuryerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKuryers extends ListRecords
{
    protected static string $resource = KuryerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
