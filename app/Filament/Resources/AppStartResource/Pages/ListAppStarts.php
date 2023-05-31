<?php

namespace App\Filament\Resources\AppStartResource\Pages;

use App\Filament\Resources\AppStartResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAppStarts extends ListRecords
{
    protected static string $resource = AppStartResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
