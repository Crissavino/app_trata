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
        $carpetas = \App\Carpetas\Numerocarpeta::all();

        // dd($carpetas);
        foreach ($carpetas as $carpeta) {
            if ($carpeta->numeroCarpeta) {
                if (!($carpeta->aformulario_id)) {
                    return redirect('/formularios/A')->with('message', 'Primero tenes que completar el Eje A!');
                }
            }
        }
        return $next($request);
    }
}
