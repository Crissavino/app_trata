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
    	var_dump($data['lat']);
    	$guardoUbicacionGeografica = \App\FormB\Mapa::create(['lat' => $data['lat'], 'long' => $data['long']]);
    	// var_dump($_POST);
    	// $_POST = json_decode($_POST['datos'], true);
    	// dd($_POST);
    }
}
