<?php

namespace App\Http\Middleware;

use Closure;

class FaltaCompletarEje
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

                // if (!($carpeta->aformulario_id)) {
                //     return redirect('/formularios/A')->with('message', 'Primero tenes que completar el Eje A de tu carpeta!');
                // }
                // if (!($carpeta->aformulario_id)) {
                //     return redirect('/formularios/A')->with('message', 'Primero tenes que completar el Eje A de tu carpeta!');
                // }elseif ($carpeta->aformulario_id && !($carpeta->bformulario_id)) {
                if ($carpeta->aformulario_id && !($carpeta->bformulario_id)) {
                    return redirect('/formularios/B')->with('message', 'Primero tenes que completar el Eje B de tu carpeta!');
                }elseif ($carpeta->aformulario_id && ($carpeta->bformulario_id) && !($carpeta->cformulario_id)) {
                    return redirect('/formularios/C')->with('message', 'Primero tenes que completar el Eje C de tu carpeta!');
                }elseif ($carpeta->aformulario_id && ($carpeta->bformulario_id) && ($carpeta->cformulario_id) && !($carpeta->dformulario_id)) {
                    return redirect('/formularios/D')->with('message', 'Primero tenes que completar el Eje D de tu carpeta!');
                }elseif ($carpeta->aformulario_id && ($carpeta->bformulario_id) && ($carpeta->cformulario_id) && ($carpeta->dformulario_id) && !($carpeta->fformulario_id)) {
                    return redirect('/formularios/F')->with('message', 'Primero tenes que completar el Eje E de tu carpeta!');
                }elseif ($carpeta->aformulario_id && ($carpeta->bformulario_id) && ($carpeta->cformulario_id) && ($carpeta->dformulario_id) && ($carpeta->fformulario_id) && !($carpeta->gformulario_id)) {
                    return redirect('/formularios/G')->with('message', 'Primero tenes que completar el Eje F de tu carpeta!');
                }

                // if (!($carpeta->eformulario_id)) {
                //     return redirect('/formularios/E')->with('message', 'Primero tenes que completar el Eje E!');
                // }
            }
        }
        return $next($request);
    }
}
