<?php

namespace App\Http\Middleware;

use Closure;

class NoHayEjeC
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

        foreach ($carpetas as $carpeta) {
            if ($carpeta->numeroCarpeta) {
                if (!($carpeta->cformulario_id)) {
                    return redirect('/formularios/C')->with('message', 'Primero tenes que completar el Eje C!');
                }
            }
        }
        return $next($request);
    }
}
