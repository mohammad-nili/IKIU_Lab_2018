<?php

namespace App\Http\Middleware;

use Closure;

class NotCustomer
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
        if (! $request->user()->NotCustomer() ) {
            return redirect('/');
        }

        return $next($request);
    }
}
