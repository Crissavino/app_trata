<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Closure;

class NoHayCarpeta
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
        $hayFormA = DB::table('aformularios')->WHERE('id', '=', Auth::id())
                                             ->first();
        if (($hayFormA === null)) {
            return redirect('formularios/A')->with('alert', 'Primero tenes que completar el Eje A!');
            // dd('Hola');
        }

        return $next($request);
    }
}
