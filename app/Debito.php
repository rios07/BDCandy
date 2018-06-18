<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Debito extends Model
{
      public $incrementing = false;
     public $autoincrement = false;
    public $timestamps = false;

    protected $table='medio_pago_debito'
  
    private $primaryKey = 'med_ped_deb_codigo';
    private $med_ped_deb_numero;
   
    private $med_ped_deb_banco;
    private $fk_cliente_juridico;
    private $fk_cliente_natural;

 }
