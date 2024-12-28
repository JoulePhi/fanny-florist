<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class TrafficOverview extends BaseWidget
{


    protected static ?int $sort = 2;
    protected function getStats(): array
    {
        // You can customize these queries based on your needs
        $todayVisits = DB::table('visits')->whereDate('created_at', today())->count();
        $monthlyVisits = DB::table('visits')->whereMonth('created_at', now()->month)->count();
        $totalVisits = DB::table('visits')->count();

        return [
            Stat::make('Today\'s Visits', $todayVisits)
                ->description('Total visits today')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),

            Stat::make('Monthly Visits', $monthlyVisits)
                ->description('Total visits this month')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([17, 16, 14, 15, 14, 13, 12])
                ->color('info'),

            Stat::make('Total Visits', $totalVisits)
                ->description('All time visits')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([15, 4, 10, 2, 12, 4, 12])
                ->color('warning'),
        ];
    }
}
