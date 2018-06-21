<?php

namespace App\Repositories;

use App\User;

class UsuarioRepository {
    private $model;
    
    public function __construct(){
        $this->model = new User();
    }

    public function findByName($q) {
        return $this->model->where('usu_nombre', 'like', "%$q%")
                           ->get();
    }
}