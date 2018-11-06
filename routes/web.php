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

//TODOS LOS FORMULARIOS
Route::get('formularios', 'FormsController@formularios')->middleware('auth');

//RUTAS DE LOGUIN Y REGISTRO QUE CREA LARAVEL
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
