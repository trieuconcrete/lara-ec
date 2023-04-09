<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Str;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        $currenturl = url()->full();
        if (Str::contains($currenturl, 'admin') || Str::contains($currenturl, 'backend')) {
            return route('backend.login');
        }
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
