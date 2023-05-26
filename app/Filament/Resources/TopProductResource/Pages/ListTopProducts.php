<?php

namespace App\Filament\Resources\TopProductResource\Pages;

use App\Filament\Resources\TopProductResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTopProducts extends ListRecords
{
    protected static string $resource = TopProductResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
