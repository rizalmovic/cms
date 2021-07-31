<?php

namespace Rizalmovic\Cms\Http\Middleware;

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class ShareInertiaData
{
    public function handle($request, $next)
    {
        Inertia::share([
            'app' => env('APP_NAME', 'Lite'),
            'page' => Route::currentRouteName(),
            'user' => fn () => $request->user() ? $request->user()->only('id', 'name', 'email', 'role') : null,
            'flash' => [
                'success' => fn () => $request->session()->get('success'),
                'info' => fn () => $request->session()->get('info'),
                'warn' => fn () => $request->session()->get('warn'),
                'error' => fn () => $request->session()->get('error'),
            ],
        ]);

        $next($request);
    }
}
