<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class MapsController extends Controller
{
    public function show()
    {
        return view('mapas');
    }

    public function getDatosMapasN()
    {
        $datosMapas = \App\Mapa\Mapacalor::WHERE('localidad', '=', 'nacimiento')
            ->whereNull('deleted_at')
            ->select('lat', 'long', DB::raw('count(*) as count'))
            ->groupBy('lat', 'long')
            ->orderBy('localidad')
            ->get();
        $datosMapasJSON = json_encode($datosMapas);
        echo $datosMapasJSON;
    }
    public function getDatosMapasC()
    {
        $datosMapas = \App\Mapa\Mapacalor::WHERE('localidad', '=', 'captacion')
            ->whereNull('deleted_at')
            ->select('lat', 'long', DB::raw('count(*) as count'))
            ->groupBy('lat', 'long')
            ->orderBy('localidad')
            ->get();
        $datosMapasJSON = json_encode($datosMapas);
        echo $datosMapasJSON;
    }
    public function getDatosMapasE()
    {
        $datosMapas = \App\Mapa\Mapacalor::WHERE('localidad', '=', 'explotacion')
            ->whereNull('deleted_at')
            ->select('lat', 'long', DB::raw('count(*) as count'))
            ->groupBy('lat', 'long')
            ->orderBy('localidad')
            ->get();
        $datosMapasJSON = json_encode($datosMapas);
        echo $datosMapasJSON;
    }

    public function getDatosMapasCN()
    {
        $datosMapas = \App\Mapa\Mapacalor::WHERE('localidad', '!=', 'explotacion')
            ->whereNull('deleted_at')
            ->select('lat', 'long', DB::raw('count(*) as count'))
            ->groupBy('lat', 'long')
            ->orderBy('localidad')
            ->get();
        $datosMapasJSON = json_encode($datosMapas);
        echo $datosMapasJSON;
    }

    public function getDatosMapasCE()
    {
        $datosMapas = \App\Mapa\Mapacalor::WHERE('localidad', '!=', 'nacimiento')
            ->whereNull('deleted_at')
            ->select('lat', 'long', DB::raw('count(*) as count'))
            ->groupBy('lat', 'long')
            ->orderBy('localidad')
            ->get();
        $datosMapasJSON = json_encode($datosMapas);
        echo $datosMapasJSON;
    }

    public function getDatosMapasNE()
    {
        $datosMapas = \App\Mapa\Mapacalor::WHERE('localidad', '!=', 'captacion')
            ->whereNull('deleted_at')
            ->select('lat', 'long', DB::raw('count(*) as count'))
            ->groupBy('lat', 'long')
            ->orderBy('localidad')
            ->get();
        $datosMapasJSON = json_encode($datosMapas);
        echo $datosMapasJSON;
    }

    public function getDatosMapasCNE()
    {
        $datosMapas = \App\Mapa\Mapacalor::WHERE('localidad', '=', 'captacion')
            ->orWhere('localidad', '=', 'nacimiento')
            ->orWhere('localidad', '=', 'explotacion')
            ->whereNull('deleted_at')
            ->select('lat', 'long', DB::raw('count(*) as count'))
            ->groupBy('lat', 'long')
            ->orderBy('localidad')
            ->get();
        $datosMapasJSON = json_encode($datosMapas);
        echo $datosMapasJSON;
    }
}
