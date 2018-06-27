<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\CompraWeb;

class PedidoController extends Controller
{
	public function __invoke()
    {
    	$comprasweb = DB::table('compra_web')
            ->join('usuario', 'compra_web.fk_usuario', '=', 'usuario.usu_codigo')
            ->select('usuario.usu_nombre', 'compra_web.*')->orderBy('com_web_codigo', 'asc')
            ->get();
        $status = DB::table('compra_web')
            ->join('estatus','compra_web.fk_estatus', '=', 'estatus.est_codigo')
            ->select('compra_web.*','est_nombre')->orderBy('com_web_codigo', 'asc')
            ->get();
    	$title = "Lista de pedidos";
    	return view ('pedidos.index', compact('comprasweb','status','title'));
    }

    public function edit($codigo)
    {
    }
}
