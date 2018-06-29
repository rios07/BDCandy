<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductoRepository;
use App\Repositories\UsuarioRepository,
    App\Repositories\ComprawebRepository,
    App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Credito;
use App\CompraWeb;
use App\ProductoCompra;
use App\Pago;

class ComprawebController extends Controller
{
	private $_usuarioRepo;
    private $_productoRepo;
    private $_comprawebRepo;

    public function __CONSTRUCT(UsuarioRepository $usuarioRepo,
        ProductoRepository $productoRepo,
        ComprawebRepository $comprawebRepo)
    {
    	$this->_usuarioRepo = $usuarioRepo;
        $this->_productoRepo = $productoRepo;
        $this->_comprawebRepo = $comprawebRepo;
    }

	public function add()
    {
        return view('comprasweb.compra');
    }

    public function findProduct(Request $req)
    {   
        return $this->_productoRepo->findByName($req->input('q'));
    }

    public function findCredito(Request $r)
    {
        $q=$r->input('q');
        $clienteNatural = DB::table('usuario')->where('usu_nombre','=',$r->input('c'))->where(function ($query){$query->whereNotNull('fk_cliente_natural');})->select('fk_cliente_natural')->first();        
        if(isset($clienteNatural))
        { 
            $tarjetas = Credito::where('fk_cliente_natural','=',$clienteNatural->fk_cliente_natural)->get();
            return $tarjetas;
        }
        else
        {
            $clienteJuridico = DB::table('usuario')->where('usu_nombre','=',$r->input('c'))->where(function ($query){$query->whereNotNull('fk_cliente_juridico');})->select('fk_cliente_juridico')->first();
            $tarjetas = Credito::where('fk_cliente_juridico','=',$clienteJuridico->fk_cliente_juridico)->get();
            return $tarjetas;
        }
    }

    public function findTienda(Request $r)
    {
        $clienteNatural = DB::table('usuario')->where('usu_nombre','=',$r->input('q'))->where(function ($query){$query->whereNotNull('fk_cliente_natural');})->select('fk_cliente_natural')->first();        
        if(isset($clienteNatural))
        {   
            $tienda = DB::table('cliente_natural')->where('cli_nat_rif','=',$clienteNatural->fk_cliente_natural)->select('fk_tienda')->first();
            return $tienda->fk_tienda;
        }
        else
        {
            $clienteJuridico = DB::table('usuario')->where('usu_nombre','=',$r->input('q'))->where(function ($query){$query->whereNotNull('fk_cliente_juridico');})->select('fk_cliente_juridico')->first();
            $tienda = DB::table('cliente_juridico')->where('cli_jur_rif','=',$clienteJuridico->fk_cliente_juridico)->select('fk_tienda')->first();
            return $tienda->fk_tienda;
        }
    }

    public function encontrar(Request $r)
    {
        $usuario = DB::table('usuario')->where('usu_nombre','=',$r->input('q'))->select('usu_codigo')->first();
        return $usuario->usu_codigo;
    }

    public function guardar(Request $r)
    {
        $hoy = date("Y-m-d");
        $data = (object)[
            'fk_tienda' => $r->input('tienda_id'),
            'fk_usuario' => $r->input('usuario_id'),
            'fk_estatus' => 1,
            'com_fecha' => $hoy,
            'com_web_monto' => $r->input('total'),
            'detail' => [],
            'detail2' => []
        ];
        foreach ($r->input('detail') as $d) 
        {
            $data->detail[] = (object)[
                'fk_producto' => $d['id'],
                'pro_com_cantidad' => $d['quantity'],
                'pro_com_precio_producto' => $d['price']
            ];
        }
        foreach ($r->input('detail2') as $d) 
        {
            $data->detail2[] = (object)[
                'fk_medio_pago_tarjeta_credito' => $d['id'],
                'pag_fecha' => $hoy,
                'pag_monto' => $d['monto']
            ];
        }

        $return = (object)[
            'response' => true
        ];

        $factura = new CompraWeb;
        $factura->com_web_monto = $data->com_web_monto;
        $factura->com_fecha = $data->com_fecha;
        $factura->fk_tienda = $data->fk_tienda;
        $factura->fk_estatus = $data->fk_estatus;
        $factura->fk_usuario = $data->fk_usuario;
        $factura->save();
        $codigo = CompraWeb::orderBy('com_web_codigo','desc')->select('com_web_codigo')->first();
        foreach ($data->detail as $d) 
        {
            $obj = new ProductoCompra;
            $obj->pro_com_cantidad = $d->pro_com_cantidad;
            $obj->pro_com_precio_producto = $d->pro_com_precio_producto;
            $obj->fk_producto = $d->fk_producto;  
            $obj->fk_compra_web = $codigo->com_web_codigo;
            $obj->save();
        }
        foreach ($data->detail2 as $d) 
        {
            $obj2 = new Pago;
            $obj2->pag_monto = $d->pag_monto;
            $obj2->pag_fecha = $d->pag_fecha;
            $obj2->fk_medio_pago_tarjeta_credito = $d->fk_medio_pago_tarjeta_credito;
            $obj2->fk_compra_web = $codigo->com_web_codigo; 
            $obj2->save();
        }
        return json_encode($return);
    }
}