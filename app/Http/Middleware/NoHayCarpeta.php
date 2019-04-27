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
        $hayFormA = DB::table('aformularios')->WHERE('deleted_at', '=', NULL)
                                             ->ORDERBY('updated_at')
                                             ->get();
      

        if ($hayFormA->count() === 0) {
            return redirect('formularios/A')->with('alert', 'Primero tenes que completar el Eje A!');
            // dd('Hola');
        }

        return $next($request);
    }
}
