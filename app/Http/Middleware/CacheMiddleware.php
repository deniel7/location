<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;

class CacheMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    /* Fetch */
    public function handle($request, Closure $next)
    {
        $key = $this->makeCacheKey($request->fullUrl());
        if (Cache::has($key)) {
            return response(Cache::get($key));
        }
        return $next($request);
    }
    
    /* Put */
    public function terminate($request, $response)
    {
        $key = $this->makeCacheKey($request->fullUrl());
        if (! Cache::has($key)) {
            Cache::put($key, $response->getContent(), env('CACHE_TIME', 60));
        }
    }

    /* Unique Key */
    protected function makeCacheKey($fullUrl)
    {
        return 'route_' . str_slug($fullUrl);
    }
}
