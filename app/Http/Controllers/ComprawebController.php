<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductoRepository;
use App\Repositories\UsuarioRepository,
    App\Repositories\ComprawebRepository,
    App\Http\Requests;

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

}