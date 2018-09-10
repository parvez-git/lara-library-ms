<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
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
        if (Auth::check() && $request->user()->role != 'Admin') {

          return redirect()->route('home');

        } elseif (Auth::check() && $request->user()->role != 'Librarian') {

          return redirect()->route('home');
        }

        return $next($request);
    }

}
