<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Exception;

class ErrorHandler
{
    public static function log(Exception $exception, string $context = '')
    {
        $data = [
            'message' => $exception->getMessage(),
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            'trace' => $exception->getTraceAsString(),
            'user_id' => auth()->id() ?? 'guest',
            'url' => request()->fullUrl(),
            'method' => request()->method(),
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ];

        Log::error($context, $data);
    }
}
