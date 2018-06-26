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

Route::get('/', 'PagesController@home')->name('home');

Route::get('/acerca','PagesController@about');

Route::get('/Clientes/','PagesController@clientes');


Route::resource('Clientes/ClienteJ/','ClienteJuridicoController2');

Route::resource('Clientes/ClienteN/','ClienteNaturalController');

Route::post('ClienteJuridicoCreate', ['as' => 'agregar', 'uses' => 'ClienteJuridicoController2@store']);

Route::delete('Clientes/ClienteJ/{ClientesJuridicos}', 'ClienteJuridicoController2@destroy')->name('ClientesJuridicos.destroy');

Route::get('Clientes/ClienteJ/editar/{cli_jur_rif}', 'ClienteJuridicoController2@edit')->name('ClientesJ.edit');

Route::post('Clientes/ClienteJ/ClienteJuridicoModificar/{cli_jur_rif}', ['as' => 'modificarj', 'uses' => 'ClienteJuridicoController2@update']);

Route::get('Clientes/ClienteJ/detalles/{cli_jur_rif}','ClienteJuridicoController2@show')->name('ClienteJ.show');

Route::resource('/puntos','PuntosController');

Route::get('/Puntos/create', 'PuntosController@create')->name('puntos.create');	

Route::post('/Puntos', ['as' => 'agregarp', 'uses' => 'PuntosController@store']);

Route::delete('Puntos/{puntos}', 'PuntosController@destroy')->name('punto.destroy');

Route::get('puntos/editarp/{pun_cod}', 'PuntosController@edit')->name('punto.edit');

Route::post('puntos/puntosModificar/{pun_cod}', ['as' => 'modificarp', 'uses' => 'PuntosController@update']);


Route::post('ClienteNaturalCreate', ['as' => 'agregarN', 'uses' => 'ClienteNaturalController@store']);

Route::delete('Clientes/ClienteN/{ClientesNaturales}', 'ClienteNaturalController@destroy')->name('ClientesNatural.destroy');

Route::get('Clientes/ClienteN/editar/{cli_nat_rif}', 'ClienteNaturalController@edit')->name('ClientesN.edit');

Route::post('Clientes/ClienteN/ClienteNaturalModificar/{cli_nat_rif}', ['as' => 'modificar', 'uses' => 'ClienteNaturalController@update']);

Route::get('Clientes/ClienteN/detalles/{cli_nat_rif}','ClienteNaturalController@show')->name('ClienteN.show');

Route::get('/productos','ProductoController')->name('productos');

Route::get('/productos/detalles/{codigo}','ProductoController@show')->where('codigo','[0-9]+')->name('productos.show');

Route::get('/productos/nuevo', 'ProductoController@create')->name('productos.create');

Route::post('/productos','ProductoController@store');

Route::get('/productos/detalles/{codigo}/editar', 'ProductoController@edit')->name('productos.edit');

Route::put('/productos/detalles/{producto}', 'ProductoController@update')->name('productos.update');

Route::delete('/productos/detalles/{producto}', 'ProductoController@destroy')->name('productos.destroy');

Route::get('/tiendas','TiendaController')->name('tiendas');

Route::get('/tiendas/detalles/{codigo}','TiendaController@show')->where('codigo','[0-9]+')->name('tiendas.show');

Route::get('/tiendas/nuevo', 'TiendaController@create')->name('tiendas.create');

Route::post('/tiendas','TiendaController@store');

Route::get('/tiendas/detalles/{codigo}/editar', 'TiendaController@edit')->name('tiendas.edit');

Route::put('/tiendas/detalles/{tienda}', 'TiendaController@update')->name('tiendas.update');

Route::delete('/tiendas/detalles/{tienda}', 'TiendaController@destroy')->name('tiendas.destroy');

Route::resource('/ventas','VentasController');

Auth::routes();