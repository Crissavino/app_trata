<?php

namespace App\Http\Middleware;

use Closure;

class NoHayEjeA
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
        $userId = auth()->user()->id;

        $carpetas = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)->get();

        foreach ($carpetas as $carpeta) {
            if ($carpeta->numeroCarpeta) {
                if (!($carpeta->aformulario_id)) {
                    return redirect('/formularios/A')->with('message', 'Primero tenes que completar el Eje A de tu carpeta!');
                }
                // if (!($carpeta->aformulario_id) && !($carpetas->user_id)) {
                //     return redirect('/formularios/A')->with('message', 'Primero tenes que completar el Eje D!');
                // }
            }
        }
        return $next($request);
    }
}
