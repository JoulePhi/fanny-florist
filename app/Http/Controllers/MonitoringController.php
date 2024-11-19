<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    public function index()
    {
        $metrics = [
            'users_count' => \App\Models\User::count(),
            'products_count' => \App\Models\Product::count(),
            'cache_hit_rate' => $this->getCacheHitRate(),
            'average_response_time' => $this->getAverageResponseTime(),
            'error_rate' => $this->getErrorRate(),
        ];

        return view('admin.monitoring.index', compact('metrics'));
    }


    private function getAverageResponseTime()
    {
        $responseTimes = cache()->get('response_times', []);

        return count($responseTimes) > 0 ? array_sum($responseTimes) / count($responseTimes) : 0;
    }

    private function getErrorRate()
    {
        $responseTimes = cache()->get('response_times', []);
        $errors = cache()->get('errors', []);

        return count($responseTimes) > 0 ? (count($errors) / count($responseTimes)) * 100 : 0;
    }

    private function getCacheHitRate()
    {
        $hits = cache()->get('cache_hits', 0);
        $misses = cache()->get('cache_misses', 0);

        return $hits + $misses > 0 ? ($hits / ($hits + $misses)) * 100 : 0;
    }
}
