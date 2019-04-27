<?php

namespace App\Http\Middleware;

use Closure;

class PuedeContinuar
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
            $aForm = \App\FormA\Aformulario::find($carpeta->aformulario_id);
            $bForm = \App\FormB\Bformulario::find($carpeta->bformulario_id);
            $cForm = \App\FormC\Cformulario::find($carpeta->cformulario_id);
            $tipoVictima = $aForm->tipovictima_id;

            if (($tipoVictima == 3) && ($aForm) && ($bForm) && ($cForm)) {
                return $next($request);
            }elseif (($tipoVictima == 2) && ($aForm) && ($bForm)) {
                return $next($request);
            }
        }

        return $next($request);
    }
}
