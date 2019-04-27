<?php

namespace App\Http\Middleware;

use Closure;

class VictimaDesconoce
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
        $idCarpeta = $request->route('idCarpeta');
        $carpeta = \App\Carpetas\Numerocarpeta::find($idCarpeta);
        $idFormA = $carpeta->aformulario_id;
        $aFormulario = \App\FormA\Aformulario::find($idFormA);
        $tipoVictima = $aFormulario->tipovictima_id;

        //si se desconoce
        if ($aFormulario) {
            if ($tipoVictima == 3) {
                return redirect('/formularios/buscador')->with('message', 'No es posible completar otro eje --Se Desconoce');
            }
        }

        return $next($request);

    }
}
