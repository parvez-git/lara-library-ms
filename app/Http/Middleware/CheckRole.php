<?php

namespace App\Http\Middleware;

use Closure;

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

        $action = $request->route()->getAction();
        $role   = isset($action['role']) ? $action['role'] : null;

        if($request->user()->hasRole($role) || !$role){
          return $next($request);
        }

        return response('Insuficient permission',401);
    }

}
