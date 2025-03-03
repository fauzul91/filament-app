<?php

namespace App\Filament\Widgets;

use App\Models\Barang;
use App\Models\FakturModel;
use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class TestWidget extends BaseWidget
{
    protected static ?int $sort = 1;
    protected function getStats(): array
    {

        return [
            Stat::make('Total Pelanggan', User::count())
                ->description('Total pelanggan yang dimiliki')
                ->descriptionIcon('heroicon-m-user-group', IconPosition::Before),

            Stat::make('Total Barang', Barang::count())
                ->description('Total barang yang dimiliki')
                ->descriptionIcon('heroicon-o-rectangle-stack', IconPosition::Before),

            Stat::make('Total Faktur', FakturModel::count())
                ->description('Total faktur yang dimiliki')
                ->descriptionIcon('heroicon-o-rectangle-stack', IconPosition::Before)
        ];
    }
}
