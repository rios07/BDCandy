<?php

namespace App\Repositories;

use App\Credito;

class UsuarioRepository {
    private $model;
    
    public function __construct(){
        $this->model = new Credito();
    }

    public function findByName($n,$q)
    {    	
        return $this->model->where('fk_cliente_natural','=',$n)->where(function ($query){$query->where('med_pag_tar_cred_numero','like','%$q%');})->get();
    }
}