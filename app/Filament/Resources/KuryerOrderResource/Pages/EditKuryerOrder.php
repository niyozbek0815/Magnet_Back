<?php

namespace App\Filament\Resources\KuryerOrderResource\Pages;

use App\Filament\Resources\KuryerOrderResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKuryerOrder extends EditRecord
{
    protected static string $resource = KuryerOrderResource::class;

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
