<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Producto;
use App\Oferta;
use App\OfertaProducto;

class OfertaController extends Controller
{
    public function __invoke()
    {
        $promociones = DB::table('producto')
            ->join('ofer_pro', 'producto.pro_codigo', '=', 'ofer_pro.fk_producto')
            ->select('ofer_pro.*', 'producto.pro_nombre')->orderBy('ofer_pro_codigo', 'asc')
            ->get();
        $ofertas = DB::table('oferta')
            ->join('ofer_pro','oferta.ofe_codigo', '=', 'ofer_pro.fk_oferta')
            ->select('oferta.*','ofer_pro_codigo')->orderBy('ofer_pro_codigo', 'asc')
            ->get();
    	$title = "Lista de ofertas";
    	return view('ofertas.index', compact('promociones', 'ofertas', 'title'));
    }

    public function show($codigo)
    {
        $producto = Producto::find($codigo);
        $tipo_producto = TipoProducto::find($producto->fk_tipo_producto);
    	return view('productos.show', compact('producto','tipo_producto'));
    }

    public function create()
    {
        $productos = Producto::all();
        return view('ofertas.create', compact('productos'));
    }

    public function store()
    {
        $data = request()->validate([
            'producto' => 'required',
            'valor' => 'required|integer',
            'fecha_inicio' => 'required|date|after:today',
            'fecha_final' => 'required|date|after:fecha_inicio',
        ],[
            'producto.required' => 'El campo producto es obligatorio',
            'valor.required' => 'El campo valor es obligatorio',
            'fecha_inicio.after' => 'El campo fecha de inicio debe ser mayor a la fecha actual',
            'fecha_final.after' => 'El campo fecha de expiración debe ser mayor a la fecha de inicio',
            'fecha_inicio.required' => 'El campo fecha de inicio es obligatorio',
            'fecha_final.required' => 'El campo fecha de expiración es obligatorio'
        ]);
        {
            $oferta = new Oferta;
            $oferta->ofe_fecha_inicio = $data['fecha_inicio'];
            $oferta->ofe_fecha_final = $data['fecha_final']; 
            $oferta->save();
            $codigo = Oferta::orderBy('ofe_codigo','desc')->first();
            if ($codigo)
            {
                $ofertapro = new OfertaProducto;
                $ofertapro->fk_oferta = $codigo->ofe_codigo;
                $ofertapro->fk_producto = $data['producto'];
                $ofertapro->ofer_pro_valor = $data['valor'];  
                $ofertapro->save();
            }
        }
       return redirect()->route('ofertas');
    }

    public function edit($codigo){
        $ofertapro = OfertaProducto::find($codigo);
        $productos = Producto::all();
        $oferta = Oferta::find($ofertapro->fk_oferta);
        return view('ofertas.edit', compact('ofertapro','productos','oferta'));
    }

    public function update(OfertaProducto $ofertapro){
        $data = request()->validate([
            'fk_producto' => 'required',
            'ofer_pro_valor' => 'required|integer',
            'ofe_fecha_inicio' => 'required|date|after:today',
            'ofe_fecha_final' => 'required|date|after:ofe_fecha_inicio'
        ],[
            'fk_producto.required' => 'El campo producto es obligatorio',
            'ofer_pro_valor.required' => 'El campo valor es obligatorio',
            'ofe_fecha_inicio.after' => 'El campo fecha de inicio debe ser mayor a la fecha actual',
            'ofe_fecha_final.after' => 'El campo fecha de expiración debe ser mayor a la fecha de inicio',
            'ofe_fecha_inicio.required' => 'El campo fecha de inicio es obligatorio',
            'ofe_fecha_final.required' => 'El campo fecha de expiración es obligatorio'
        ]);
        $oferta = Oferta::find($ofertapro->fk_oferta);
        $oferta->update(['ofe_fecha_inicio' => $data['ofe_fecha_inicio'], 'ofe_fecha_final' => $data['ofe_fecha_final']]);
        $ofertapro->update(['ofe_pro_valor' => $data['ofe_pro_valor'], 'fk_producto' => $data['fk_producto']]);        
        return redirect()->route('ofertas');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos');
    }
}