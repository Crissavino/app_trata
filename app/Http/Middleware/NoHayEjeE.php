<?php

namespace App\Http\Middleware;

use Closure;

class NoHayEjeE
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

        foreach ($carpetas as $carpeta) {
            if ($carpeta->numeroCarpeta) {
                if (!($carpeta->eformulario_id)) {
                    return redirect('/formularios/E/' . $carpeta->id . '/' . $carpeta->eformulario_id)->with('message', 'Primero tenes que completar el Eje E de tu carpeta!');
                }
            }
        }
        return $next($request);
    }
}
