<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tienda;
use App\Lugar;
use App\PedidoTienda;
use App\Producto;
use Illuminate\Support\Facades\DB;

class TiendaController extends Controller
{
    public function __invoke()
    {
    	$tiendas = Tienda::orderBy('tie_codigo', 'asc')->get();
    	$title = "Lista de tiendas";
    	return view('tiendas.index', compact('tiendas', 'title'));
    }

    public function show($codigo)
    {
        $tienda = Tienda::find($codigo);
        $lugar = Lugar::where('lug_codigo', $tienda->fk_lugar)->first();
    	return view('tiendas.show', compact('tienda', 'lugar'));
    }

    public function pedidos($codigo)
    {
        $pedidos = DB::table('producto')
            ->join('pedido_tienda', 'producto.pro_codigo', '=', 'pedido_tienda.fk_producto')
            ->select('pedido_tienda.*','producto.pro_nombre','producto.pro_codigo')
            ->where('pedido_tienda.fk_tienda', $codigo)
            ->get();
        $tienda = Tienda::find($codigo);
        return view('tiendas.pedidos', compact('pedidos', 'tienda'));
    }

    public function create()
    {
        $tipo_tiendas = array('tienda','mini tienda');
        $lugares = Lugar::where('lug_tipo','Parroquia')->orderBy('lug_nombre','asc')->get();
        return view('tiendas.create', compact('tipo_tiendas', 'lugares'));
    }

    public function store()
    {
        $data = request()->validate([
            'rif' => 'required',
            'nombre' => 'required',
            'descripcion' => 'required',
            'tipo' => 'required',
            'lugar' => 'required'
        ],[
            'rif.required' => 'El campo rif es obligatorio',
            'nombre.required' => 'El campo nombre es obligatorio',
            'descripcion.required' => 'El campo descripcion es obligatorio',
            'tipo.required' => 'El campo tipo es obligatorio',
            'lugar.required' => 'El campo lugar es obligatorio'
        ]);
        $tienda = new Tienda;
        $tienda->tie_rif = $data['rif'];
        $tienda->tie_nombre = $data['nombre'];
        $tienda->tie_descripcion = $data['descripcion'];
        $tienda->tie_tipo = $data['tipo'];
        $tienda->fk_lugar = $data['lugar'];           
        $tienda->save();
       return redirect()->route('tiendas');
    }

    public function edit($codigo){
        $tienda = Tienda::find($codigo);
       	$tipo_tiendas = array('tienda','mini tienda');
        $lugares = Lugar::where('lug_tipo','Parroquia')->orderBy('lug_nombre','asc')->get();
        return view('tiendas.edit', compact('tienda','tipo_tiendas','lugares'));
    }

    public function update(Tienda $tienda){
        $data = request()->validate([
            'tie_rif' => 'required',
            'tie_nombre' => 'required',
            'tie_descripcion' => 'required',
            'tie_tipo' => 'required',
            'fk_lugar' => 'required',
        ],[
            'tie_rif.required' => 'El campo rif es obligatorio',
            'tie_nombre.required' => 'El campo nombre es obligatorio',
            'tie_descripcion.required' => 'El campo descripcion es obligatorio',
            'tie_tipo.required' => 'El campo tipo es obligatorio',
            'fk_lugar.required' => 'El campo lugar es obligatorio'
        ]);  
        $tienda->update($data);
        return redirect()->route('tiendas.show', ['codigo' => $tienda->tie_codigo]);
    }

    public function destroy(Tienda $tienda)
    {
        $tienda->delete();
        return redirect()->route('tiendas');
    }
}