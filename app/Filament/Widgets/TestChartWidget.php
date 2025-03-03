<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class TestChartWidget extends ChartWidget
{
    protected static ?int $sort = 2;
    protected static ?string $heading = 'Profit';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Profit Track',
                    'data' => [3, 10, 9, 10, 8, 12, 9, 20, 9, 10, 8, 12,]
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }
    

    protected function getType(): string
    {
        return 'line';
    }
}
