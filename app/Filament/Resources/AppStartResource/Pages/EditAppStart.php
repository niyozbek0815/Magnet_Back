<?php

namespace App\Filament\Resources\AppStartResource\Pages;

use App\Filament\Resources\AppStartResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAppStart extends EditRecord
{
    protected static string $resource = AppStartResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
