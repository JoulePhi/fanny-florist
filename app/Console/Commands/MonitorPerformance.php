<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class MonitorPerformance extends Command
{
    protected $signature = 'monitor:performance';
    protected $description = 'Monitor website performance metrics';

    public function handle()
    {
        $this->info('Starting performance monitoring...');

        // Check database query performance
        $this->checkSlowQueries();

        // Check cache hit rates
        $this->checkCacheMetrics();

        // Check image optimization
        $this->checkImageOptimization();

        $this->info('Performance monitoring completed!');
    }

    private function checkSlowQueries()
    {
        $slowQueries = DB::select("SELECT * FROM mysql.slow_log WHERE start_time > DATE_SUB(NOW(), INTERVAL 24 HOUR)");
        if (count($slowQueries) > 0) {
            $this->warn(count($slowQueries) . ' slow queries detected in the last 24 hours');
        }
    }

    private function checkCacheMetrics()
    {
        $cacheHits = Cache::get('cache_hits', 0);
        $cacheMisses = Cache::get('cache_misses', 0);

        if ($cacheHits + $cacheMisses > 0) {
            $hitRate = ($cacheHits / ($cacheHits + $cacheMisses)) * 100;
            $this->info("Cache hit rate: {$hitRate}%");
        }
    }

    private function checkImageOptimization()
    {
        // Add logic to check image sizes and optimization status
    }
}
