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
Route::resource('Clientes/ClienteJ','ClienteJuridicoController2');

Route::get('/', 'PagesController@home');

Route::get('/acerca','PagesController@about');

Route::get('/Clientes/','PagesController@clientes');

Route::get('/Productos','ProductoController');

Route::post('ClienteJuridicoCreate', 
  ['as' => 'agregar', 'uses' => 'ClienteJuridicoController2@store']);

