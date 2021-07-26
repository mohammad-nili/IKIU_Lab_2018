<?php

namespace App\Http\Middleware;

use Closure;

class Register_customer
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

        if (! $request->user()->Register_customer() ) {
            return redirect('/completeRegister');
        }

        return $next($request);
    }
}
