<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapsController extends Controller
{
    public function show()
    {
    	return view('mapas');
    }

    public function getDatosMapas()
    {
    	$datosMapas = \App\FormB\Mapa::all();

    	$datosMapasJSON = json_encode($datosMapas);

    	echo $datosMapasJSON;
    }

    public function gurdarDatos()
    {
    	var_dump('$_POST');
    	$data = request()->all();
    	var_dump('Entro');
        // $ultimoFormB = \App\FormB\Bformulario::orderBy('created_at', 'desc')->first();
        $guardoUbicacionGeografica = \App\FormB\Mapa::create(['bformulario_id' => 0, 'lat' => $data['lat'], 'long' => $data['long'], 'count' => $data['count'], 'user_id' => $data['user_id']]);
    	// $guardoUbicacionGeografica = \App\FormB\Mapa::create(['lat' => $data['lat'], 'long' => $data['long']]);
    	// var_dump($_POST);
    	// $_POST = json_decode($_POST['datos'], true);
    	// dd($_POST);
    }

    public function actualizarDatos()
    {
        $data = request()->all();
        // var_dump('Entro');
        // var_dump($data['bformulario_id']);
        $actualizoUbicacionGeografica = \App\FormB\Mapa::WHERE('bformulario_id', '=', $data['bformulario_id'])->update(['bformulario_id' => $data['bformulario_id'], 'lat' => $data['lat'], 'long' => $data['long'], 'count' => $data['count'], 'user_id' => $data['user_id']]);
    }
}
