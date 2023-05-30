<?php

namespace App\Filament\Resources\KuryerResource\Pages;

use App\Filament\Resources\KuryerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKuryer extends EditRecord
{
    protected static string $resource = KuryerResource::class;

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
