<?php

namespace App\Http\Middleware;

use Closure;
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
=======
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d

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
<<<<<<< HEAD
        if (Auth::check() && $request->user()->role != 'Admin') {

          return redirect()->route('home');

        } elseif (Auth::check() && $request->user()->role != 'Librarian') {

          return redirect()->route('home');
        }

        return $next($request);
    }

=======
        $actions = $request->route()->getAction();
        $roles = isset($actions['roles']) ? $actions['roles'] : null;

        if($request->user()->hasAnyRole($roles) || !$roles){
          return $next($request);
        }

        return response('Insuficient permission',401);
    }
>>>>>>> 0e09d9c680d1937892a74e6be5b2caff71e5f16d
}
