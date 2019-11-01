<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
        public function handle($request, Closure $next, ...$roles)
        {
            $roleIds = ['admin' => 'admin', 'superadmin' => 'superadmin', 'driver' => 'driver'];

            $allowedRoleIds = [];
            foreach ($roles as $role)
            {
               if(isset($roleIds[$role]))
               {
                   $allowedRoleIds[] = $roleIds[$role];
               }
            }
            $allowedRoleIds = array_unique($allowedRoleIds); 
            $userRoles = Auth::user()->roles->pluck('name');
            if(Auth::check()) {
              if(in_array($userRoles[0], $allowedRoleIds)) {
                return $next($request);
              }
            }
    
            return redirect('/permission-denied');
        }
}
