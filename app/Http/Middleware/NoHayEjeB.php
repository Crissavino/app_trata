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

        $carpetas = \App\Carpetas\Numerocarpeta::where('user_id', '=', $userId)->get();

        // dd($carpetas->count() == 0);
        foreach ($carpetas as $carpeta) {
            if ($carpeta->numeroCarpeta) {
                if (!($carpeta->bformulario_id)) {
                    return redirect('/formularios/B')->with('message', 'Primero tenes que completar el Eje B de tu carpeta!');
                }
            }
        }
        return $next($request);
    }
}
