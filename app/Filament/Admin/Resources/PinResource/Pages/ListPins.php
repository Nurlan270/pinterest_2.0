<?php

namespace App\Filament\Admin\Resources\PinResource\Pages;

use App\Filament\Admin\Resources\PinResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPins extends ListRecords
{
    protected static string $resource = PinResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
