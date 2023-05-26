<?php

namespace App\Filament\Resources\TopProductsResource\Pages;

use App\Filament\Resources\TopProductsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTopProducts extends EditRecord
{
    protected static string $resource = TopProductsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
