<?php

namespace App\Http\Middleware;

use Closure;

class NoHayEjeD
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
                if (!($carpeta->dformulario_id)) {
                    return redirect('/formularios/D')->with('message', 'Primero tenes que completar el Eje D de tu carpeta!');
                }
            }
        }
        return $next($request);
    }
}
