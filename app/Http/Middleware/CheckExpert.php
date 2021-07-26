<?php

namespace App\Http\Middleware;

use Closure;

class CheckExpert
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
        if (! $request->user()->isExpert() ) {
            return redirect('/');
        }

        return $next($request);
    }
}
