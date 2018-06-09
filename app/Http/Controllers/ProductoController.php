<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Producto;

class ProductoController extends Controller
{
    public function __invoke()
    {
    	$productos = Producto::all();
    	$title = "Lista de productos";
    	return view('productos.index', compact('productos', 'title'));
    }

    public function show($codigo)
    {
        $producto = Producto::where('pro_codigo','=',$codigo)->first();
    	return view('productos.show', compact('producto'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store()
    {
        $data = request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'sabor' => 'required',
            'color' => 'required'
        ],[
            'nombre.required' => 'El campo nombre es obligatorio',
            'descripcion.required' => 'El campo descripcion es obligatorio',
            'sabor.required' => 'El campo sabor es obligatorio',
            'color.required' => 'El campo color es obligatorio'
        ]);

        if (empty($data['relleno']))
        Producto::create([
            'pro_nombre' => $data['nombre'],
            'pro_descripcion' => $data['descripcion'],
            'pro_sabor' => $data['sabor'],
            'pro_color' => $data['color'],
            'pro_fabrica' => $data['fabrica'],
            'pro_tipo_producto' => $data['tipo'] 
        ]);
        else
            Producto::create([
            'pro_nombre' => $data['nombre'],
            'pro_descripcion' => $data['descripcion'],
            'pro_sabor' => $data['sabor'],
            'pro_color' => $data['color'],
            'pro_relleno' => $data['relleno'],
            'pro_fabrica' => $data['fabrica'],
            'pro_tipo_producto' => $data['tipo'] 
        ]);
       return redirect()->route('productos');
    }
}