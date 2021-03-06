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
Route::post('buscar_cliente_ajax', ['as' => 'buscar_cliente_ajax', 'uses' => 'ClienteProveedorController@buscar_cliente_ajax']);



//Unidades
Route::get('alta-unidades', ['as' => 'alta-unidades', 'uses' => 'UnidadesController@alta']);
Route::get('ver-unidades', ['as' => 'ver-unidades', 'uses' => 'UnidadesController@showAll']);
Route::get('ver-unidad/{id}', ['as' => 'ver-unidad', 'uses' => 'UnidadesController@show']);
Route::post('save-unidades', ['as' => 'save-unidades', 'uses' => 'UnidadesController@save']);
Route::post('update-unidades', ['as' => 'update-unidades', 'uses' => 'UnidadesController@update']);

//Folios
Route::get('alta-folios', ['as' => 'alta-folios', 'uses' => 'FoliosController@alta']);
Route::get('ver-folios', ['as' => 'ver-folios', 'uses' => 'FoliosController@showAll']);
Route::post('save-folios', ['as' => 'save-folios', 'uses' => 'FoliosController@save']);
Route::post('save-varios-folios', ['as' => 'save-varios-folios', 'uses' => 'FoliosController@saveVarios']);


//Giros Empresas
Route::get('alta-giro-empresa', ['as' => 'alta-giro-empresa', 'uses' => 'GirosEmpresasController@alta']);
Route::post('save-giro-empresa', ['as' => 'save-giro-empresa', 'uses' => 'GirosEmpresasController@save']);
Route::get('ver-giro-empresa', ['as' => 'ver-giro-empresa', 'uses' => 'GirosEmpresasController@show']);

//Ventas
Route::get('alta-venta/{id}', ['as' => 'alta-venta', 'uses' => 'VentasController@alta']);
Route::get('ver-venta/{id}', ['as' => 'ver-venta', 'uses' => 'VentasController@show']);
Route::get('ver-ventas', ['as' => 'ver-ventas', 'uses' => 'VentasController@showAll']);
Route::post('save-venta', ['as' => 'save-venta', 'uses' => 'VentasController@save']);
Route::post('abonar-pago', ['as' => 'abonar-pago', 'uses' => 'VentasController@abonarPago']);
// Route::get('alta-venta/{id}', ['as' => 'alta-venta', 'uses' => 'VentasController@alta']);

//Pagos
Route::get('ver-pagos/', ['as' => 'ver-pagos', 'uses' => 'PagoController@show']);