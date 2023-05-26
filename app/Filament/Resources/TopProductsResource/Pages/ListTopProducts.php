<?php

namespace App\Filament\Resources\TopProductsResource\Pages;

use App\Filament\Resources\TopProductsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTopProducts extends ListRecords
{
    protected static string $resource = TopProductsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
