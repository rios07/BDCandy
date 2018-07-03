<?php

namespace App\Repositories;

use App\ClienteNatural;

class UsuarioRepository {
    private $model;
    
    public function __construct(){
        $this->model = new ClienteNatural();
    }

    public function findByName($q) {
        return $this->model->where('cli_nat_rif', 'like', "%$q%")->get();
    }
}