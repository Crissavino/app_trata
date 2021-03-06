<?php

namespace App\Http\Middleware;

use Closure;

class NoHayEjeB
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
                        where('id', '=', $id_carpeta )
                        -> where('deleted_at', '=', NULL )->get();
        $idFormA = \App\Carpetas\Numerocarpeta::find($id_carpeta)->aformulario_id;
        $tipoVictima = \App\FormA\Aformulario::find($idFormA)->tipovictima_id;


        // dd($carpetas->count() == 0);
        foreach ($carpetas as $carpeta) {
            if ($carpeta->numeroCarpeta) {
                if (!($carpeta->bformulario_id)) {
                    return redirect('/formularios/B/'.$carpeta->id.'/'.$carpeta->bformulario_id)->with('message', 'Primero tenes que completar el Eje B de tu carpeta!');
                }elseif ($carpeta->bformulario_id && ($tipoVictima == 2)) {
                    return redirect('/formularios/buscador')->with('message', 'No es posible completar otro eje --No es victima');
                }
            }
        }
        return $next($request);
    }
}
