<?php

namespace App\Http\Middleware;

use Closure;
use App\Role;

class CheckAdminRights
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
        $user = $request->user();
        $adminRoleSlug = Role::where('slug', 'admin')->first()->slug;

        if($user->role->slug === $adminRoleSlug) {
            return $next($request);
        }

        return redirect()->route('home');
    }
}
