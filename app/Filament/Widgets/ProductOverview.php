<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Product;
use App\Models\Category;


class ProductOverview extends BaseWidget
{
    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        return [
            Stat::make('Total Product', Product::count()),
            Stat::make('Total Available Product', Product::where('is_available', 1)->count()),
            Stat::make('Total Categories', Category::count()),
        ];
    }
}
