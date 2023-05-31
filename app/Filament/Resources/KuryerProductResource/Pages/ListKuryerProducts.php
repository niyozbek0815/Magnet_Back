<?php

namespace App\Filament\Resources\KuryerProductResource\Pages;

use App\Filament\Resources\KuryerProductResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKuryerProducts extends ListRecords
{
    protected static string $resource = KuryerProductResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
