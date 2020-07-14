<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Periodo
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
        if (Auth::check() && $request->session()->has('periodo_id'))
        {
            return $next($request);
        } else {
            return redirect()->route('preview');
        }
    }
}
