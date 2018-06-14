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

Route::get('/', 'PagesController@home');

Route::get('/about','PagesController@about');

Route::get('/Clientes/','PagesController@clientes');

Route::get('/Productos','ProductoController');

Route::post('ClienteJuridicoCreate', 
  ['as' => 'agregar', 'uses' => 'ClienteJuridicoController2@store']);

Route::delete('Clientes/ClienteJ/{ClientesJuridicos}', 'ClienteJuridicoController2@destroy')->name('ClientesJuridicos.destroy');

Route::get('Clientes/ClienteJ/{codigo}/editar', 'ClienteJuridicoController2@edit')->name('ClientesJ.edit');
Route::put('Clientes/ClienteJ/{producto}', 'ClienteJuridicoController2@update')->name('ClientesJ.update');