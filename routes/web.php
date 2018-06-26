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
Route::resource('Clientes/ClienteJ/','ClienteJuridicoController2');

Route::resource('Clientes/ClienteN/','ClienteNaturalController');

Route::resource('/puntos','PuntosController');

Route::post('ClienteJuridicoCreate', 
  ['as' => 'agregar', 'uses' => 'ClienteJuridicoController2@store']);

Route::delete('Clientes/ClienteJ/{ClientesJuridicos}', 'ClienteJuridicoController2@destroy')->name('ClientesJuridicos.destroy');

Route::put('Clientes/ClienteJ/{producto}', 'ClienteJuridicoController2@update')->name('ClientesJ.update');

Route::get('/', 'PagesController@home')->name('home');

Route::get('/acerca','PagesController@about');

Route::get('/Clientes/','PagesController@clientes');

Route::get('/productos','ProductoController')->name('productos');

Route::get('/productos/detalles/{codigo}','ProductoController@show')->where('codigo','[0-9]+')->name('productos.show');

Route::get('/Puntos/create', 'PuntosController@create')->name('puntos.create');	

Route::post('/Puntos', ['as' => 'agregarp', 'uses' => 'PuntosController@store']);

Route::delete('Puntos/{puntos}', 'PuntosController@destroy')->name('punto.destroy');

Route::get('puntos/editarp/{pun_cod}', 'PuntosController@edit')->name('punto.edit');

Route::post('puntos/puntosModificar/{pun_cod}', ['as' => 'modificarp', 'uses' => 'PuntosController@update']);

Route::get('Clientes/ClienteJ/editar/{cli_jur_rif}', 'ClienteJuridicoController2@edit')->name('ClientesJ.edit');

Route::post('Clientes/ClienteJ/ClienteJuridicoModificar/{cli_jur_rif}', ['as' => 'modificar', 'uses' => 'ClienteJuridicoController2@update']);

Route::get('Clientes/ClienteJ/detalles/{cli_jur_rif}','ClienteJuridicoController2@show')->name('ClienteJ.show');

Route::post('ClienteNaturalCreate', ['as' => 'agregarN', 'uses' => 'ClienteNaturalController@store']);

Route::delete('Clientes/ClienteN/{ClientesNaturales}', 'ClienteNaturalController@destroy')->name('ClientesNatural.destroy');

Route::get('Clientes/ClienteN/editar/{cli_nat_rif}', 'ClienteNaturalController@edit')->name('ClientesN.edit');

Route::post('Clientes/ClienteN/ClienteNaturalModificar/{cli_nat_rif}', ['as' => 'modificar', 'uses' => 'ClienteNaturalController@update']);

Route::get('Clientes/ClienteN/detalles/{cli_nat_rif}','ClienteNaturalController@show')->name('ClienteN.show');

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

Route::get('/comprar', 'ComprawebController@add')->name('comprasweb.add');

Route::get('/comprar/encontrarproducto', 'ComprawebController@findProduct');

Route::get('/ofertas', 'OfertaController')->name('ofertas');

Route::get('/ofertas/nuevo', 'OfertaController@create')->name('ofertas.create');

Route::post('/ofertas','OfertaController@store');

Route::get('/ofertas/{codigo}/editar', 'OfertaController@edit')->name('ofertas.edit');

Route::put('/ofertas/{ofertapro}', 'OfertaController@update')->name('ofertas.update');

Route::delete('/ofertas/{codigo}', 'OfertaController@destroy')->name('ofertas.destroy');

Route::get('/tiendas/detalles/{codigo}/pedidos', 'TiendaController@pedidos')->name('tiendas.pedidos');

Route::get('/pedidos', 'PedidoController')->name('pedidos');

Route::get('/pedidos/cambiar_estatus/{codigo}','PedidoController@edit')->name('pedidos.edit');

Auth::routes();