<?php

namespace App\Http\Middleware;

use Closure;

class checkAuth
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
        if (!$this->auth->user() )
        {
            return route('login')->with('alert', 'Сперва авторизируйтесь');
        }
        return $next($request);
    }

}
