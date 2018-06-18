<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    protected $table = 'tipo_producto';

    protected $primaryKey = 'tip_pro_codigo';

    public $incrementing = false;

    public $autoincrement = false;

    public $timestamps = false;
}
