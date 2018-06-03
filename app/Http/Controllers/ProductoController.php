<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class ProductoController extends Controller
{
    public function __invoke()
    {
    	$productos = Producto::all();
    	$title = "Lista de productos";
    	return view('productos.index', compact('productos', 'title'));
    }
}