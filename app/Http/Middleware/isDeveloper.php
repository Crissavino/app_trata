<?php

namespace App\Http\Middleware;

use Closure;

class isDeveloper
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
        $user = auth()->user();
        // dd($user);
        if (($user == null) || ($user->isDeveloper !== 1)) {
            return redirect('/');
        }
            
        return $next($request);
    }
}
