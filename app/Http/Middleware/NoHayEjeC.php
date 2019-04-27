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
        $userId = auth()->user()->id;
        $id_carpeta = $request->route('idCarpeta');
        $carpetas = \App\Carpetas\Numerocarpeta::
            where('id', '=', $id_carpeta)
            ->where('deleted_at', '=', null)->get();
        $idFormA = \App\Carpetas\Numerocarpeta::find($id_carpeta)->aformulario_id;
        $tipoVictima = \App\FormA\Aformulario::find($idFormA)->tipovictima_id;
        // @dd($request->route('idCarpeta'));

        foreach ($carpetas as $carpeta) {
            if ($carpeta->numeroCarpeta) {
                if (!($carpeta->cformulario_id) && ($tipoVictima !== 2)) {
                    return redirect('/formularios/C/'.$carpeta->id.'/'.$carpeta->cformulario_id)->with('message', 'Primero tenes que completar el Eje C de tu carpeta!');
                }elseif ($carpeta->cformulario_id && ($tipoVictima == 3)) {
                    return redirect('/formularios/buscador')->with('message', 'No es posible completar otro eje --Se Desconoce');
                }
            }
        }
        return $next($request);
    }
}
