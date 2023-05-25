<?php

namespace App\Filament\Resources\OrderProductsResource\Pages;

use App\Filament\Resources\OrderProductsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrderProducts extends CreateRecord
{
    protected static string $resource = OrderProductsResource::class;
}
