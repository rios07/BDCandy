<?php

namespace App\Repositories;

use App\CompraWeb;
use App\ProductoCompra;
use DB;

class ComprawebRepository {

    private $model;
    
    public function __construct(){
        $this->model = new CompraWeb();
    }

    public function get($id) {
        return $this->model->find($id);
    }

    public function getAll() {
        return $this->model->orderBy('com_web_codigo', 'desc')->get();
    }

    public function save($data) {
        $return = (object)[
            'response' => true
        ];

            $this->model->fk_estatus = 1;
            $this->model->com_web_monto = $data->total;
            $this->model->fk_usuario = $data->client_id;
            $this->model->save();

            $detail = [];
            foreach($data->detail as $d) {
                $obj = new ProductoCompra;

                $obj->pro_com_codigo = $d->product_id;
                $obj->pro_com_cantidad = $d->quantity;
                $obj->pro_com_precio_producto = $d->unitPrice;

                $detail[] = $obj;
            }

            $this->model->detail()->saveMany($detail);

        return json_encode($return);
    }
}
