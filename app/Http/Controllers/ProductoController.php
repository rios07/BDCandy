<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Producto;
use App\TipoProducto;

class ProductoController extends Controller
{
    public function __invoke()
    {
    	$productos = Producto::orderBy('pro_codigo', 'asc')->get();
    	$title = "Lista de productos";
    	return view('productos.index', compact('productos', 'title'));
    }

    public function show($codigo)
    {
        $producto = Producto::find($codigo);
        $tipo_producto = TipoProducto::find($producto->fk_tipo_producto);
    	return view('productos.show', compact('producto','tipo_producto'));
    }

    public function create()
    {
        $tipo_productos = TipoProducto::all();
        return view('productos.create', compact('tipo_productos'));
    }

    public function store()
    {
        $data = request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'sabor' => 'required',
            'color' => 'required',
            'relleno' => '',
            'tipo' => 'integer',
        ],[
            'nombre.required' => 'El campo nombre es obligatorio',
            'descripcion.required' => 'El campo descripcion es obligatorio',
            'sabor.required' => 'El campo sabor es obligatorio',
            'color.required' => 'El campo color es obligatorio'
        ]);
        if (empty($data['relleno']))
        {
            unset($data['relleno']);
            $producto = new Producto;
            $producto->pro_nombre = $data['nombre'];
            $producto->pro_descripcion = $data['descripcion'];
            $producto->pro_sabor = $data['sabor'];
            $producto->pro_color = $data['color'];
            $producto->fk_fabrica = 1;
            $producto->fk_tipo_producto = $data['tipo'];
            $producto->save();
        }
        else
        {
            $producto = new Producto;
            $producto->pro_nombre = $data['nombre'];
            $producto->pro_descripcion = $data['descripcion'];
            $producto->pro_sabor = $data['sabor'];
            $producto->pro_color = $data['color'];
            $producto->pro_relleno = $data['relleno'];
            $producto->fk_fabrica = 1;
            $producto->fk_tipo_producto = $data['tipo'];            
            $producto->save();
        }
       return redirect()->route('productos');
    }

    public function edit($codigo){
        $producto = Producto::find($codigo);
        $tipo_productos = TipoProducto::all();
        return view('productos.edit', compact('producto','tipo_productos'));
    }

    public function update(Producto $producto){
        $data = request()->validate([
            'pro_nombre' => 'required',
            'pro_descripcion' => 'required',
            'pro_sabor' => 'required',
            'pro_color' => 'required',
            'pro_relleno' => '',
            'fk_tipo_producto' => 'integer'
        ],[
            'pro_nombre.required' => 'El campo nombre es obligatorio',
            'pro_descripcion.required' => 'El campo descripcion es obligatorio',
            'pro_sabor.required' => 'El campo sabor es obligatorio',
            'pro_color.required' => 'El campo color es obligatorio'
        ]);  
        $producto->update($data);
        return redirect()->route('productos.show', ['codigo' => $producto->pro_codigo]);
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos');
    }
}