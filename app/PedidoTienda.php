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

    protected $fillable = [
        'ped_tie_cantidad', 'ped_tie_fecha_emision', 'ped_tie_fecha_entrega', 'fk_tienda', 'fk_producto', 'fk_estatus'];

 }