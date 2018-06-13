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

Route::get('/Clientes/ClientesNaturales','ClienteNaturalController@index');

Route::get('/Clientes/ClientesJuridicos','ClienteJuridicoController@index');

Route::get('/Clientes/ClientesJuridicos/CrearClienteJuridico','ClienteJuridicoController@create');

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

Auth::routes();