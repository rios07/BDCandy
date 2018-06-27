<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfertaProducto extends Model
{
    protected $table = 'ofe_pro';

    protected $primaryKey = 'ofe_pro_codigo';

    public $incrementing = false;
    
    public $autoincrement = false;

    public $timestamps = false;

    protected $fillable = ['ofe_pro_valor','fk_producto','fk_oferta'];
}
