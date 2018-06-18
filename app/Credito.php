<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
    //
     public $timestamps = false;

   private $primaryKey = 'med_pag_che_codigo';
    private $med_pag_che_numero;
    private $med_ped_che_cuenta;
    private $med_ped_che_banco;
    private $fk_cliente_juridico;
    private $fk_cliente_natural;
}
