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
        $carpetas = \App\Carpetas\Numerocarpeta::all();

        foreach ($carpetas as $carpeta) {
            if ($carpeta->numeroCarpeta) {

                // if (!($carpeta->aformulario_id)) {
                //     return redirect('/formularios/A')->with('message', 'Primero tenes que completar el Eje A!');
                // }

                if (!($carpeta->bformulario_id)) {
                    return redirect('/formularios/B')->with('message', 'Primero tenes que completar el Eje B!');
                }

                if (!($carpeta->cformulario_id)) {
                    return redirect('/formularios/C')->with('message', 'Primero tenes que completar el Eje C!');
                }

                if (!($carpeta->dformulario_id)) {
                    return redirect('/formularios/D')->with('message', 'Primero tenes que completar el Eje D!');
                }

                if (!($carpeta->eformulario_id)) {
                    return redirect('/formularios/E')->with('message', 'Primero tenes que completar el Eje E!');
                }

                if (!($carpeta->fformulario_id)) {
                    return redirect('/formularios/F')->with('message', 'Primero tenes que completar el Eje F!');
                }

                if (!($carpeta->gformulario_id)) {
                    return redirect('/formularios/G')->with('message', 'Primero tenes que completar el Eje G!');
                }
            }
        }
        return $next($request);
    }
}
