<?php

namespace App\Filament\Resources\SellersResource\Pages;

use App\Filament\Resources\SellersResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSellers extends EditRecord
{
    protected static string $resource = SellersResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
