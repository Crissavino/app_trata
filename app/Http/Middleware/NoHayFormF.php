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
        // $hayFormE = DB::table('fformularios')->WHERE('user_id', '=', Auth::id())
        // 									 ->ORDERBY('numeroCarpeta')
								// 			 ->get();
        $hayFormE = \App\FormF\Fformulario::WHERE('user_id', '=', Auth::id())->orderBy('numeroCarpeta');
        // dd($hayFormE->numeroCarpeta);

        if ($hayFormE->count() === 0) {
            return redirect('formularios/F')->with('alert', 'Primero tenes que completar el Eje F!');
        }

        return $next($request);
    }
}
