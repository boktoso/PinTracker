<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request)
            ->header('Access-Control-Allow-Origin', env('APP_CORS_ALLOWED_ORIGINS', ''))
            ->header('Access-Control-Allow-Methods', env('APP_CORS_ALLOWED_METHODS', 'GET'));
    }
}
