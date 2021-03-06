<?php

namespace App\Http\Middleware;

use Closure;

class NoHayEjeF
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
        $id_carpeta = $request->route('idCarpeta');
        $carpetas = \App\Carpetas\Numerocarpeta::
            where('id', '=', $id_carpeta)
            ->where('deleted_at', '=', null)->get();
        $idFormA = \App\Carpetas\Numerocarpeta::find($id_carpeta)->aformulario_id;
        $tipoVictima = \App\FormA\Aformulario::find($idFormA)->tipovictima_id;

        foreach ($carpetas as $carpeta) {
            if ($carpeta->numeroCarpeta) {
                if (!($carpeta->fformulario_id) && ($tipoVictima == 1)) {
                    return redirect('/formularios/F/' . $carpeta->id . '/' . $carpeta->fformulario_id)->with('message', 'Primero tenes que completar el Eje E de tu carpeta!');
                }elseif ($carpeta->fformulario_id && ($tipoVictima !== 1)) {
                    return redirect('/formularios/buscador')->with('message', 'No es posible completar otro eje --No es victima');
                }
            }
        }
        return $next($request);
    }
}
