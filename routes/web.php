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

//RUTAS BUSCADOR NOMBRE
Route::get('formularios/buscadorNombre', 'FormsController@searchName')->middleware('auth');
Route::get('formularios/buscadorVictima', 'FormsController@searchVictim')->middleware('auth');

//RUTAS FORMULARIO A
// Route::get('formularios/A', 'FormsController@createA')->middleware('auth');
Route::get('formularios/A', 'FormsController@createA')->middleware('auth', 'faltaCompletarEje', 'soloLectura');
Route::post('formularios/A', 'FormsController@insertA');
Route::get('formularios/edicion/A/{idCarpeta}/{idFormulario}', 'FormsController@editA')->middleware('auth');
Route::put('formularios/edicion/A/{idCarpeta?}/{idFormulario?}', 'FormsController@updateA');
Route::delete('formularios/edicion/A/{id}', 'FormsController@destroyA');

//RUTAS FORMULARIO B
//funciona el middleware, de esa manera verifico q haya un usuario registrado
Route::get('formularios/B/{idCarpeta?}/{idFormulario?}', 'FormsController@createB')->middleware('auth', 'noHayEjeA', 'soloLectura');
Route::post('formularios/B/{idCarpeta?}/{idFormulario?}', 'FormsController@insertB');
Route::get('formularios/edicion/B/{idCarpeta}/{idFormulario}', 'FormsController@editB')->middleware('auth');
Route::put('formularios/edicion/B/{idCarpeta?}/{idFormulario?}', 'FormsController@updateB');
Route::delete('formularios/edicion/B/{idCarpeta?}', 'FormsController@destroyB');

//RUTAS FORMULARIO C
//funciona el middleware, de esa manera verifico q haya un usuario registrado
Route::get('formularios/C/{idCarpeta?}/{idFormulario?}', 'FormsController@createC')->middleware('auth', 'noHayCarpeta', 'noHayEjeA', 'noHayEjeB', 'soloLectura');
Route::post('formularios/C/{idCarpeta?}/{idFormulario?}', 'FormsController@insertC');
Route::get('formularios/edicion/C/{idCarpeta}/{idFormulario}', 'FormsController@editC')->middleware('auth');
Route::put('formularios/edicion/C/{idCarpeta?}/{idFormulario?}', 'FormsController@updateC');
Route::delete('formularios/edicion/C/{id}', 'FormsController@destroyC');

//RUTAS FORMULARIO D
Route::get('formularios/D/{idCarpeta?}/{idFormulario?}', 'FormsController@createD')->middleware('auth', 'noHayCarpeta', 'noHayEjeA', 'noHayEjeB', 'noHayEjeC', 'soloLectura');
Route::post('formularios/D/{idCarpeta?}/{idFormulario?}', 'FormsController@insertD');
Route::get('formularios/edicion/D/{idCarpeta}/{idFormulario}', 'FormsController@editD')->middleware('auth');
Route::put('formularios/edicion/D/{idCarpeta?}/{idFormulario?}', 'FormsController@updateD');
Route::delete('formularios/edicion/D/{id}', 'FormsController@destroyD');

//RUTAS FORMULARIO E
// Route::get('formularios/E/{idCarpeta?}/{idFormulario?}', 'FormsController@createE')->middleware('auth', 'noHayCarpeta', 'noHayEjeA', 'noHayEjeB', 'noHayEjeC', 'noHayEjeD');
// Route::post('formularios/E', 'FormsController@insertE');
// Route::get('formularios/edicion/E/{idCarpeta}/{idFormulario}', 'FormsController@editE')->middleware('auth');
// Route::put('formularios/edicion/E/{id}', 'FormsController@updateE');
// Route::delete('formularios/edicion/E/{id}', 'FormsController@destroyE');

//RUTAS FORMULARIO F
//SUSPENDIDO EL EJE E, EL EJE F PASA A SER EL NUEVO EJE E
// Route::get('formularios/F/{idCarpeta?}/{idFormulario?}', 'FormsController@createF')->middleware('auth', 'noHayCarpeta', 'noHayEjeA', 'noHayEjeB', 'noHayEjeC', 'noHayEjeD', 'noHayEjeE', 'noHayFormE');
Route::get('formularios/F/{idCarpeta?}/{idFormulario?}', 'FormsController@createF')->middleware('auth', 'noHayCarpeta', 'noHayEjeA', 'noHayEjeB', 'noHayEjeC', 'noHayEjeD', 'soloLectura');
Route::post('formularios/F/{idCarpeta?}/{idFormulario?}', 'FormsController@insertF');
Route::get('formularios/edicion/F/{idCarpeta}/{idFormulario}', 'FormsController@editF')->middleware('auth');
Route::put('formularios/edicion/F/{idCarpeta?}/{idFormulario?}', 'FormsController@updateF');
Route::delete('formularios/edicion/F/{id}', 'FormsController@destroyF');

//RUTAS FORMULARIO G
Route::get('formularios/G/{idCarpeta?}/{idFormulario?}', 'FormsController@createG')->middleware('auth', 'noHayCarpeta', 'noHayEjeA', 'noHayEjeB', 'noHayEjeC', 'noHayEjeD', 'noHayEjeF', 'soloLectura');
// Route::get('formularios/G', 'FormsController@createG')->middleware('auth', 'noHayCarpeta', 'noHayEjeA', 'noHayEjeB', 'noHayEjeC', 'noHayEjeD', 'noHayEjeF', 'noHayFormF');
Route::post('formularios/G/{idCarpeta?}/{idFormulario?}', 'FormsController@insertG');
Route::get('formularios/edicion/G/{idCarpeta}/{idFormulario}', 'FormsController@editG')->middleware('auth');
Route::put('formularios/edicion/G/{idCarpeta?}/{idFormulario?}', 'FormsController@updateG');
Route::delete('formularios/edicion/G/{id}', 'FormsController@destroyG');

//TODOS LOS FORMULARIOS
// Route::get('formularios', 'FormsController@formularios')->middleware('auth', 'soloLectura');

//MAPAS DE CALOR
//ver tambien de poner si es administrador
Route::get('/mapas', 'MapsController@show')->middleware('auth');
Route::get('/mapas/datos', 'MapsController@getDatosMapas')->middleware('auth');
//todavia resta ver como guardar el id
Route::post('/mapas', 'MapsController@gurdarDatos')->middleware('auth');
Route::put('/mapas', 'MapsController@actualizarDatos')->middleware('auth');

// //GENERAR PDF
// Route::get('/pdf/{id}', 'FormsController@exportarPDFG')->middleware('auth');

Route::get('/estadisticas', 'FormsController@showEstadisticas')->middleware('auth');
Route::get('/descargarEstadisticas', 'FormsController@exportarExcel')->middleware('auth');



//RUTAS DE LOGUIN, LOGOUT Y REGISTRO QUE CREA LARAVEL
Auth::routes();
Route::post('/isDeveloper', 'FormsController@isDeveloper');
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/logout', 'Auth\LoginController@logout');

