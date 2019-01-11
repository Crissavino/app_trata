<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Closure;

class NoHayFormF
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
        $hayFormF = DB::table('fformularios')->WHERE('user_id', '=', Auth::id())
        									 ->ORDERBY('updated_at')
											 ->get();
        if ($hayFormF->count() === 0) {
            return redirect('formularios/F')->with('alert', 'Primero tenes que completar el Eje F!');
            // dd('Hola');
        }

        return $next($request);
    }
}
