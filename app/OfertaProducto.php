<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfertaProducto extends Model
{
    protected $table = 'ofer_pro';

    protected $primaryKey = 'ofer_pro_codigo';

    public $incrementing = false;
    
    public $autoincrement = false;

    public $timestamps = false;

    protected $fillable = ['ofer_pro_valor','fk_producto','fk_oferta'];
}
