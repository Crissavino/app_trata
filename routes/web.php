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
})->name('welcome');

//rutas de los formularios, lo que debo hacer despues es dejar una variable {tipoDeFormulario} en la que por get la pase un tipo de formulario y cambie

Route::get('index', 'FormsController@index')->middleware('auth');

//RUTAS BUSCADOR
Route::get('formularios/buscador', 'FormsController@search')->middleware('auth');
Route::post('formularios/buscador', 'FormsController@search')->middleware('auth');

//RUTAS FORMULARIO A
Route::get('formularios/A', 'FormsController@createA')->middleware('auth');
Route::post('formularios/A', 'FormsController@insertA');
Route::get('formularios/edicion/A/{id}', 'FormsController@editA')->middleware('auth');
Route::put('formularios/edicion/A/{id}', 'FormsController@updateA');
Route::delete('formularios/edicion/A/{id}', 'FormsController@destroyA');

//RUTAS FORMULARIO B
//funciona el middleware, de esa manera verifico q haya un usuario registrado
Route::get('formularios/B', 'FormsController@createB')->middleware('auth', 'noHayCarpeta');
// Route::get('formularios/B', 'FormsController@createB');
Route::post('formularios/B', 'FormsController@insertB');
Route::get('formularios/edicion/B/{id}', 'FormsController@editB')->middleware('auth');
Route::put('formularios/edicion/B/{id}', 'FormsController@updateB');
Route::delete('formularios/edicion/B/{id}', 'FormsController@destroyB');

//RUTAS FORMULARIO C
//funciona el middleware, de esa manera verifico q haya un usuario registrado
Route::get('formularios/C', 'FormsController@createC')->middleware('auth', 'noHayCarpeta');
// Route::get('formularios/C', 'FormsController@createC');
Route::post('formularios/C', 'FormsController@insertC');
Route::get('formularios/edicion/C/{id}', 'FormsController@editC')->middleware('auth');
Route::put('formularios/edicion/C/{id}', 'FormsController@updateC');
Route::delete('formularios/edicion/C/{id}', 'FormsController@destroyC');

//RUTAS FORMULARIO D
Route::get('formularios/D', 'FormsController@createD')->middleware('auth', 'noHayCarpeta');
Route::post('formularios/D', 'FormsController@insertD');
Route::get('formularios/edicion/D/{id}', 'FormsController@editD')->middleware('auth');
Route::put('formularios/edicion/D/{id}', 'FormsController@updateD');
Route::delete('formularios/edicion/D/{id}', 'FormsController@destroyD');

//RUTAS FORMULARIO E
Route::get('formularios/E', 'FormsController@createE')->middleware('auth', 'noHayCarpeta');
Route::post('formularios/E', 'FormsController@insertE');
Route::get('formularios/edicion/E/{id}', 'FormsController@editE')->middleware('auth');
Route::put('formularios/edicion/E/{id}', 'FormsController@updateE');
Route::delete('formularios/edicion/E/{id}', 'FormsController@destroyE');

//RUTAS FORMULARIO F
Route::get('formularios/F', 'FormsController@createF')->middleware('auth', 'noHayCarpeta');
Route::post('formularios/F', 'FormsController@insertF');
Route::get('formularios/edicion/F/{id}', 'FormsController@editF')->middleware('auth');
Route::put('formularios/edicion/F/{id}', 'FormsController@updateF');
Route::delete('formularios/edicion/F/{id}', 'FormsController@destroyF');

//RUTAS FORMULARIO G
Route::get('formularios/G', 'FormsController@createG')->middleware('auth', 'noHayCarpeta', 'noHayFormF');
Route::post('formularios/G', 'FormsController@insertG');
Route::get('formularios/edicion/G/{id}', 'FormsController@editG')->middleware('auth');
Route::put('formularios/edicion/G/{id}', 'FormsController@updateG');
Route::delete('formularios/edicion/G/{id}', 'FormsController@destroyG');

//TODOS LOS FORMULARIOS
Route::get('formularios', 'FormsController@formularios')->middleware('auth');

//RUTAS DE LOGUIN Y REGISTRO QUE CREA LARAVEL
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
