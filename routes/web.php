<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('home');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('configuracion/tipoInstitucion', '\App\Http\Controllers\TipoInstitucionesController');
Route::resource('layouts/Menu', 'MenuController@index');
Route::resource('configuracion/roles', '\App\Http\Controllers\RolesController');
Route::resource('configuracion/especies', '\App\Http\Controllers\EspeciesController');
Route::resource('configuracion/provincias', '\App\Http\Controllers\ProvinciasController');
Route::resource('configuracion/departamentos', '\App\Http\Controllers\DepartamentosController');
//  Route::post('configuracion/departamentos/search', ['as' => '\App\Http\Controllers\departamentos.search', 'uses'=>'departamentosController@search']);
 Route::resource('configuracion/localidad', '\App\Http\Controllers\LocalidadesController');

// // ------------------------------------------------------------------------
Route::resource('Inscripciones/Inscripcion', '\App\Http\Controllers\InscripcionesController');
Route::resource('Inscripciones/Institucion', '\App\Http\Controllers\InstitucionesController');
Route::resource('Inscripciones/Referente', '\App\Http\Controllers\ReferenteController');
Route::resource('Inscripciones/Productor', '\App\Http\Controllers\ProductorController');
Route::resource('Inscripciones/Item', '\App\Http\Controllers\ItemController');

// Route::resource('livewire/Item', '\App\Http\Livewire\Item');
Route::get('Inscripciones/Productor/buscar', ['as' => 'Productor.buscar', 'uses'=>'\App\Http\Controllers\ProductorController@busqueda']);
Route::get('Inscripciones/Inscripcion/LoadItem', ['as' => 'Inscripcion.LoadItem', 'uses'=>'\App\Http\Controllers\InscripcionesController@LoadItem']);
Route::get('Inscripciones/export/', ['as' => 'Inscripcion.export','uses'=>'App\Http\Controllers\InscripcionesController@export']);
Route::get('Productor/export/', ['as' => 'Productor.export','uses'=>'App\Http\Controllers\ProductorController@export']);
//-------------------------------------------------------------------------
// Route::resource('Entregas/Entrega', 'EntregaController');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/Livewire/item', function () {

    return view('default');

    });
Auth::routes(["register" => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
