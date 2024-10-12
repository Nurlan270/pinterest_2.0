<?php

namespace App\Filament\Admin\Resources\PinResource\Pages;

use App\Filament\Admin\Resources\PinResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePin extends CreateRecord
{
    protected static string $resource = PinResource::class;
}
