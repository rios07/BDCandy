<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoTienda extends Model
{
    protected $table = 'pedido_tienda';

    protected $primaryKey = 'ped_tie_codigo';

    public $incrementing = false;
    
    public $autoincrement = false;

    public $timestamps = false;

 }