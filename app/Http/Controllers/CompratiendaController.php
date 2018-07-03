<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductoCompra;
use App\Pago;
use App\Producto;
use App\CompraTienda;
use App\Credito;
use App\Debito;
use App\Cheque;
use App\Orden;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Repositories\UsuarioRepository;
use App\Repositories\ProductoRepository;

class CompratiendaController extends Controller
{
	private $_usuarioRepo;
	private $_productoRepo;

    public function __CONSTRUCT(UsuarioRepository $usuarioRepo, ProductoRepository $productoRepo)
    {
        $this->_usuarioRepo = $usuarioRepo;
        $this->_productoRepo = $productoRepo;
    }

    public function __invoke($codigo)
    {
        $tienda = DB::table('empleado')->where('emp_codigo','=', $codigo)->first();
        $facturas = CompraTienda::where('fk_tienda', $tienda->fk_tienda)->orderBy('com_tie_codigo','desc')->get();
        $title = "Compra en tienda";
        return view('comprastienda.index', compact('facturas', 'title'));
    }

    public function agregar()
    {
    	return view('comprastienda.compra');
    }

    public function catalogo()
    {
        $productos = Producto::orderBy('pro_codigo', 'asc')->get();
        $title = "Lista de productos";
        return view('comprastienda.catalogo', compact('productos', 'title'));
    }

    public function findCliente(Request $req)
    {
        return $this->_usuarioRepo->findByName($req->input('q'));
    }

    public function findProduct(Request $req)
    {   
        return $this->_productoRepo->findByName($req->input('q'));
    }

    public function findCredito(Request $r)
    {
        $q=$r->input('q');
        $tarjetas = Credito::where('fk_cliente_natural','=',$r->input('c'))->get();
        return $tarjetas;
    }

    public function findDebito(Request $r)
    {
        $q=$r->input('q');
        $tarjetas = Debito::where('fk_cliente_natural','=',$r->input('c'))->get();
        return $tarjetas;
    }

    public function findCheque(Request $r)
    {
        $q=$r->input('q');
        $tarjetas = Cheque::where('fk_cliente_natural','=',$r->input('c'))->get();
        return $tarjetas;
    }

    public function findTienda(Request $r)
    {
        $empleado = DB::table('usuario')->where('usu_nombre','=',$r->input('q'))->where(function ($query){$query->whereNotNull('fk_empleado');})->select('fk_empleado')->first();         
            $tienda = DB::table('empleado')->where('emp_codigo','=',$empleado->fk_empleado)->select('fk_tienda')->first();
            return $tienda->fk_tienda;
    }

    public function facturar(Request $r)
    {
        $hoy = date("Y-m-d");
        $data = (object)[
            'fk_tienda' => $r->input('tienda_id'),
            'fk_cliente_natural' => $r->input('client_id'),
            'com_tie_fecha' => $hoy,
            'fk_punto' => 10,
            'com_tie_punto_ganado' => $r->input('puntos'),
            'com_tie_monto' => $r->input('total'),
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
                'fk_medio_pago' => $d['id'],
                'pag_fecha' => $hoy,
                'metodo' => $d['metodo'],
                'pag_monto' => $d['monto']
            ];
        }

        $return = (object)[
            'response' => true
        ];

        $factura = new CompraTienda;
        $factura->com_tie_monto = $data->com_tie_monto;
        $factura->com_tie_fecha = $data->com_tie_fecha;
        $factura->fk_tienda = $data->fk_tienda;
        $factura->fk_cliente_natural = $data->fk_cliente_natural;
        $factura->fk_punto = $data->fk_punto;
        $factura->com_tie_punto_ganado = $data->com_tie_punto_ganado;
        $factura->save();
        $codigo = CompraTienda::orderBy('com_tie_codigo','desc')->first();
        $orden = new Orden;
        $orden->fk_compra_tienda = $codigo->com_tie_codigo;
        $orden->save();
        foreach ($data->detail as $d) 
        {
            $obj = new ProductoCompra;
            $obj->pro_com_cantidad = $d->pro_com_cantidad;
            $obj->pro_com_precio_producto = $d->pro_com_precio_producto;
            $obj->fk_producto = $d->fk_producto; 
            $revisarInventario = DB::table('almacen')
            ->join('inventario','almacen.alm_codigo', '=', 'inventario.fk_almacen')
            ->where([['inventario.fk_producto', '=', $obj->fk_producto],[ 'almacen.fk_tienda', '=', $codigo->fk_tienda]])
            ->select('inventario.inv_cantidad')
            ->get();
            //dd($revisarInventario);
            foreach ($revisarInventario as $key => $value) {
                $cantidad = $value->inv_cantidad-$obj->pro_com_cantidad;
                if ($value->inv_cantidad <= 100) 
                {
                    $ordenReposicion = new PedidoTienda;
                    $ordenReposicion->ped_tie_cantidad = 10000;
                    $ordenReposicion->ped_tie_fecha_emision = $hoy;
                    $ordenReposicion->fk_estatus = 1;
                    $ordenReposicion->fk_producto = $obj->fk_producto;
                    $ordenReposicion->fk_tienda = $codigo->fk_tienda;
                    $ordenReposicion->save();
                    break;
                }                
            }
            $actualizarInventario = DB::table('inventario')
            ->join('almacen','almacen.alm_codigo', '=', 'inventario.fk_almacen')
            ->where([['inventario.fk_producto', '=', $obj->fk_producto],[ 'almacen.fk_tienda', '=', $codigo->fk_tienda]])
            ->update(['inv_cantidad' => $cantidad]);
            $obj->fk_compra_tienda = $codigo->com_tie_codigo;
            $obj->save();            
        }        
        foreach ($data->detail2 as $d) 
        {
            $obj2 = new Pago;
            $obj2->pag_monto = $d->pag_monto;
            $obj2->pag_fecha = $d->pag_fecha;
            switch ($d->metodo) {
    			case "Cheque":
    				$obj2->fk_medio_pago_cheque = $d->fk_medio_pago;
        			break;
        		case "Tarjeta de credito":
        			$obj2->fk_medio_pago_tarjeta_credito = $d->fk_medio_pago;
        			break;
        		case "Tarjeta de debito":
        			$obj2->fk_medio_pago_tarjeta_debito = $d->fk_medio_pago;
        			break;
			}            	
            $obj2->fk_compra_tienda = $codigo->com_tie_codigo; 
            $obj2->save();
        }        
        return json_encode($return);
    }
}
