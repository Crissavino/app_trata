<?php

namespace App\Http\Middleware;

use Closure;

class SoloLectura
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
        
        if ($user->isAdmin == 2) {
            return redirect('/formularios/buscador')->with('message', 'Este usuario tiene permisos de solo lectura!');
        }

        return $next($request);
    }
}
