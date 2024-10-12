<?php

namespace App\Filament\Admin\Resources\PinResource\Pages;

use App\Filament\Admin\Resources\PinResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPin extends EditRecord
{
    protected static string $resource = PinResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
