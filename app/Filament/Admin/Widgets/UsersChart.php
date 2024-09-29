<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\ChartWidget;

class UsersChart extends ChartWidget
{
    protected static ?string $heading = 'Users';

    protected function getData(): array
    {
        return [

        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
