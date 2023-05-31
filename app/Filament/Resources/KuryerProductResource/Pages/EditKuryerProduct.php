<?php

namespace App\Filament\Resources\KuryerProductResource\Pages;

use App\Filament\Resources\KuryerProductResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKuryerProduct extends EditRecord
{
    protected static string $resource = KuryerProductResource::class;

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
