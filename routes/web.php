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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', ['as' => '/', 'uses' => 'sitioController@home']);

// Clientes/Provedores
Route::get('/alta-cliente-proveedor', ['as' => '/alta-cliente-proveedor', 'uses' => 'ClienteProveedorController@alta']);
Route::post('save-cliente-proveedor', ['as' => 'save-cliente-proveedor', 'uses' => 'ClienteProveedorController@save']);
Route::get('ver-clientes-proveedores', ['as' => 'ver-clientes-proveedores', 'uses' => 'ClienteProveedorController@show']);
Route::get('datos-clientes-proveedores/{id}', ['as' => 'datos-clientes-proveedores', 'uses' => 'ClienteProveedorController@datos']);



//Unidades
Route::get('alta-unidades', ['as' => 'alta-unidades', 'uses' => 'UnidadesController@alta']);
Route::post('save-unidades', ['as' => 'save-unidades', 'uses' => 'UnidadesController@save']);

//Folios
Route::get('alta-folios', ['as' => 'alta-folios', 'uses' => 'FoliosController@alta']);
Route::post('save-folios', ['as' => 'save-folios', 'uses' => 'FoliosController@save']);