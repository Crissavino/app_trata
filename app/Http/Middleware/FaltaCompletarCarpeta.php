<?php

namespace App\Http\Middleware;

use Closure;

class FaltaCompletarCarpeta
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
        // $carpetas = \App\Carpetas\Numerocarpeta::orderBy('numeroCarpeta');
        $carpetas = \App\Carpetas\Numerocarpeta::all();

        
        // foreach ($carpetas as $carpeta) {
        //     dd($carpeta->aformulario() !== null);
        // }

        $carpetas->each(function($carpetas){
            dd($carpetas->bformulario_id === null);
            if ($carpetas->bformulario_id === null) {
                return redirect('/formularios/B')->with('alert', 'Primero tenes que completar el Eje B!');
            }
            // dd($carpetas->has('cformulario_id'));
            // // $numero = $carpetas->numeroCarpeta;
            // if ($carpetas->cformulario_id === null) {
            //     return redirect('/formularios/B')->with('alert', 'Primero tenes que completar el Eje B!');
            // }

            // // if ($carpetas->bformulario_id === null) {
            // //     return redirect('formularios/B')->with('alert', 'Primero tenes que completar el Eje B!');
            // // }
        });
        

        return $next($request);
    }
}
