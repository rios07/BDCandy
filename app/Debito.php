<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Debito extends Model
{
     public $incrementing = false;
     public $autoincrement = false;
    public $timestamps = false;

    protected $table='medio_pago_tarjeta_debito';
  
    protected $primaryKey = 'med_pag_tar_deb_codigo';
    private $med_pag_tar_deb_numero;
    private $med_pag_tar_deb_tipo;
    private $med_pag_tar_deb_banco;
   
    private $fk_cliente_juridico;
    private $fk_cliente_natural;

    protected $fillable=['med_pag_tar_deb_numero','med_pag_tar_deb_tipo',  'med_pag_tar_deb_banco', 'fk_cliente_juridico', 'fk_cliente_natural'];

 }
