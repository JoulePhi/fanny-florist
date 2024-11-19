<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckProductionConfig extends Command
{
    protected $signature = 'config:check-production';
    protected $description = 'Check production configuration settings';

    public function handle()
    {
        $this->info('Checking production configuration...');

        $checks = [
            'APP_ENV' => 'production',
            'APP_DEBUG' => false,
            'SESSION_SECURE_COOKIES' => true,
            'CACHE_DRIVER' => ['redis', 'memcached'],
            'SESSION_DRIVER' => ['redis', 'memcached'],
            'QUEUE_CONNECTION' => ['redis', 'database'],
        ];

        $passed = true;

        foreach ($checks as $key => $expectedValue) {
            $actualValue = config(strtolower($key));

            if (is_array($expectedValue)) {
                if (!in_array($actualValue, $expectedValue)) {
                    $this->error("❌ {$key} should be one of: " . implode(', ', $expectedValue));
                    $passed = false;
                }
            } else {
                if ($actualValue !== $expectedValue) {
                    $this->error("❌ {$key} should be {$expectedValue}");
                    $passed = false;
                }
            }
        }

        if ($passed) {
            $this->info('✅ All production configuration checks passed!');
        }
    }
}
