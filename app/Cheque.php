<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cheque extends Model
{
    
    public $incrementing = false;
     public $autoincrement = false;
    public $timestamps = false;

    protected $table='medio_pago_cheque'
  
    private $primaryKey = 'med_pag_che_codigo';
    private $med_pag_che_numero;
    private $med_pag_che_cuenta;
    private $med_pag_che_banco;
    private $fk_cliente_juridico;
    private $fk_cliente_natural;

   private $fillable=['med_pag_che_numero','med_pag_che_cuenta',  'med_pag_che_banco', 'fk_cliente_juridico', 'fk_cliente_natural'  ];
}
