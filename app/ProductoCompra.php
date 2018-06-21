<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoCompra extends Model {

    protected $table = 'producto_compra';

    protected $primaryKey = 'pro_com_codigo';

    public $incrementing = false;
    
    public $autoincrement = false;

    public $timestamps = false;

    public function product(){
        return $this->belongsTo('App\Producto', 'pro_codigo');
    }
}
