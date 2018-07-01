<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompraWeb;
use App\ProductoCompra;
use App\Producto;
use Illuminate\Support\Facades\DB;

class FacturaController extends Controller
{
    public function __invoke($codigo)
    {
    	$facturas = CompraWeb::where('fk_usuario', $codigo)->orderBy('com_web_codigo', 'desc')->get();
    	$title = "Lista de facturas";
    	return view('facturas.index', compact('facturas', 'title'));
    }

    public function show($codigo)
    {
        $total = CompraWeb::find($codigo);
        $detalles = ProductoCompra::where('fk_compra_web', $codigo)->get();
        $productos = Producto::all();
        $title = "Detalle de compra";
    	return view('facturas.show', compact('detalles','productos', 'title', 'total'));
    }

    public function pagos($codigo)
    {
        $total = CompraWeb::find($codigo);
        $pagos = DB::table('pago')
            ->join('medio_pago_tarjeta_credito','pago.fk_medio_pago_tarjeta_credito', '=', 'medio_pago_tarjeta_credito.med_pag_tar_cred_codigo')
            ->where('pago.fk_compra_web', $codigo)
            ->select('pago.pag_fecha','pago.pag_monto','medio_pago_tarjeta_credito.*')->orderBy('pago.pag_monto', 'asc')
            ->get();
        $title = "Detalles de pago";
        return view('facturas.pagos', compact('pagos', 'title', 'total'));
    }
}
