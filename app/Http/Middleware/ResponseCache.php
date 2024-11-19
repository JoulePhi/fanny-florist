<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cache;

class ResponseCache
{
    public function handle(Request $request, Closure $next)
    {
        if (!$this->shouldCache($request)) {
            return $next($request);
        }

        $cacheKey = 'page_' . sha1($request->fullUrl());

        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $response = $next($request);

        if ($this->shouldCache($request) && $response->status() === 200) {
            Cache::put($cacheKey, $response, now()->addMinutes(30));
        }

        return $response;
    }

    private function shouldCache(Request $request): bool
    {
        return $request->isMethod('GET') &&
            !$request->is('admin/*') &&
            !$request->is('login') &&
            !$request->is('register');
    }
}
