<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Closure;

class NoHayFormE
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
        // $hayFormE = DB::table('Eformularios')->WHERE('user_id', '=', Auth::id())
        // 									 ->ORDERBY('numeroCarpeta')
								// 			 ->get();
        $userId = auth()->user();

        dd($userId);
        $hayFormE = \App\FormE\Eformulario::WHERE('user_id', '=', Auth::id())->orderBy('numeroCarpeta');
        // dd($hayFormE->count());

        if ($hayFormE->count() === 0) {
            return redirect('formularios/E')->with('alert', 'Primero tenes que completar el Eje E!');
        }

        return $next($request);
    }
}
