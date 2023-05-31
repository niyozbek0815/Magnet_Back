<?php

namespace App\Filament\Resources\KuryerStatusResource\Pages;

use App\Filament\Resources\KuryerStatusResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKuryerStatuses extends ListRecords
{
    protected static string $resource = KuryerStatusResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
