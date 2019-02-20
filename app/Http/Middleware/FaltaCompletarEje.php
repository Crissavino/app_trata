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
                if (!($carpeta->aformulario)) {
                    return redirect('/formularios/A'.$carpeta->id.'/'.$carpeta->aformulario_id)->with('message', 'Primero tenes que completar el Eje A de tu carpeta!');
                }elseif ($carpeta->aformulario && !($carpeta->bformulario)) {
                    return redirect('/formularios/B/'.$carpeta->id.'/'.$carpeta->bformulario_id)->with('message', 'Primero tenes que completar el Eje B de tu carpeta!');
                }elseif ($carpeta->aformulario && ($carpeta->bformulario) && !($carpeta->cformulario)) {
                    return redirect('/formularios/C/'.$carpeta->id.'/'.$carpeta->cformulario_id)->with('message', 'Primero tenes que completar el Eje C de tu carpeta!');
                }elseif ($carpeta->aformulario && ($carpeta->bformulario) && ($carpeta->cformulario) && !($carpeta->dformulario)) {
                    return redirect('/formularios/D/'.$carpeta->id.'/'.$carpeta->dformulario_id)->with('message', 'Primero tenes que completar el Eje D de tu carpeta!');
                }elseif ($carpeta->aformulario && ($carpeta->bformulario) && ($carpeta->cformulario) && ($carpeta->dformulario) && !($carpeta->fformulario)) {
                    return redirect('/formularios/F/'.$carpeta->id.'/'.$carpeta->fformulario_id)->with('message', 'Primero tenes que completar el Eje E de tu carpeta!');
                }elseif ($carpeta->aformulario && ($carpeta->bformulario) && ($carpeta->cformulario) && ($carpeta->dformulario) && ($carpeta->fformulario) && !($carpeta->gformulario)) {
                    return redirect('/formularios/G/'.$carpeta->id.'/'.$carpeta->gformulario_id)->with('message', 'Primero tenes que completar el Eje F de tu carpeta!');
                }

                // if (!($carpeta->eformulario_id)) {
                //     return redirect('/formularios/E')->with('message', 'Primero tenes que completar el Eje E!');
                // }
            }
        }
        return $next($request);
    }
}
