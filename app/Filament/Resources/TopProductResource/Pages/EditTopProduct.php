<?php

namespace App\Filament\Resources\TopProductResource\Pages;

use App\Filament\Resources\TopProductResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTopProduct extends EditRecord
{
    protected static string $resource = TopProductResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
