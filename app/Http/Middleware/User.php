<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!\Auth::guest() && \Auth::user()->role=='kullanici')
        {
            return $next($request);

        } else {
            return redirect(route('homepage'))->with('error','Erişim Yetkiniz Yok');
        }

        return redirect(route('homepage'));
    }
}
