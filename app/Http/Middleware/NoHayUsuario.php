<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Closure;

class NoHayUsuario
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
        //con Auth::id() obtengo, si existe, un ID, si no obtengo null, entonces pregunte si Auth::id() es falso, lo niego para que sea verdadero y entre en el if
        // dd((Auth::id()));
        // $hayUsuario = DB::table('users')->get();
        // dd(Auth::user());
        if (!(Auth::user())) {
            return redirect('login');
        }
       return $next($request);
    }
}
