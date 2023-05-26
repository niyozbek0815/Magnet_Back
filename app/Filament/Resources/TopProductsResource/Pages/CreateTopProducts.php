<?php

namespace App\Filament\Resources\TopProductsResource\Pages;

use App\Filament\Resources\TopProductsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTopProducts extends CreateRecord
{
    protected static string $resource = TopProductsResource::class;
}
