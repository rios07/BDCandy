<?php

namespace App\Repositories;

use App\Producto;

class ProductoRepository {
    private $model;
    
    public function __construct(){
        $this->model = new Producto();
    }

    public function findByName($q) {
        return $this->model->where('pro_nombre', 'like', "%$q%")->get();
    }
}