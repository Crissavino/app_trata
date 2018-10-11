<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//rutas de los formularios, lo que debo hacer despues es dejar una variable {tipoDeFormulario} en la que por get la pase un tipo de formulario y cambie

Route::get('index', 'FormsController@index');

Route::get('formularios/A', 'FormsController@createA');
Route::post('formularios/A', 'FormsController@insertA');
Route::get('formularios/edicion/A/{id}', 'FormsController@editA');
Route::put('formularios/edicion/A/{id}', 'FormsController@updateA');

Route::get('formularios/B', 'FormsController@createB');
Route::post('formularios/B', 'FormsController@insertB');
Route::get('formularios/edicion/B/{id}', 'FormsController@editB');
Route::put('formularios/edicion/B/{id}', 'FormsController@updateB');
//ver como seguir para cambiar el estado de un formulario y no mostrarlo con deleteB o destroyB
// Route::put('formularios/edicion/B/{id}', 'FormsController@deleteB');



