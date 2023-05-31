<?php

namespace App\Filament\Resources\KuryerOrderResource\Pages;

use App\Filament\Resources\KuryerOrderResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKuryerOrders extends ListRecords
{
    protected static string $resource = KuryerOrderResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
