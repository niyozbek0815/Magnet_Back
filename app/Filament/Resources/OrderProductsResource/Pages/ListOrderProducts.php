<?php

namespace App\Filament\Resources\OrderProductsResource\Pages;

use App\Filament\Resources\OrderProductsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrderProducts extends ListRecords
{
    protected static string $resource = OrderProductsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
