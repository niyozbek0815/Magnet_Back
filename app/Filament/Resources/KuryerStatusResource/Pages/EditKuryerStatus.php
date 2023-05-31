<?php

namespace App\Filament\Resources\KuryerStatusResource\Pages;

use App\Filament\Resources\KuryerStatusResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKuryerStatus extends EditRecord
{
    protected static string $resource = KuryerStatusResource::class;

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
