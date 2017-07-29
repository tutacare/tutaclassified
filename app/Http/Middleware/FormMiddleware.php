<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class FormMiddleware
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
      if (Auth::user()->phone == null  && Auth::user()->city_id == null)
      {
          return redirect('auth/legal-action');
      }
        return $next($request);
    }
}
