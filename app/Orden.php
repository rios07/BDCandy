<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $table = 'orden_despacho';

    protected $primaryKey = 'ord_des_codigo';

    public $incrementing = false;
    
    public $autoincrement = false;

    public $timestamps = false;

    protected $fillable = ['fk_compra_web', 'fk_presupuesto', 'fk_compra_tienda'];
}
