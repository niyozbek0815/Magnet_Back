<?php

namespace App\Filament\Resources\OrderProductsResource\Pages;

use App\Filament\Resources\OrderProductsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrderProducts extends EditRecord
{
    protected static string $resource = OrderProductsResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
