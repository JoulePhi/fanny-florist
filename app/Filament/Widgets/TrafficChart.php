<?php

namespace App\Filament\Widgets;

use App\Models\Visit;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TrafficChart extends ChartWidget
{
    protected static ?string $heading = 'Traffic Analysis';
    protected static ?int $sort = 3;
    protected int | string | array $columnSpan = 'full';
    protected function getData(): array
    {
        $days = collect(range(6, 0))->map(function ($days) {
            return Carbon::now()->subDays($days)->format('Y-m-d');
        });

        $visits = Visit::whereIn(
            DB::raw('DATE(created_at)'),
            $days
        )
            ->groupBy('date')
            ->orderBy('date')
            ->get([
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as count')
            ])
            ->pluck('count', 'date')
            ->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Visits',
                    'data' => $days->map(fn($date) => $visits[$date] ?? 0)->toArray(),
                    'borderColor' => '#4CAF50',
                ],
            ],
            'labels' => $days->map(fn($date) => Carbon::parse($date)->format('M d'))->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
