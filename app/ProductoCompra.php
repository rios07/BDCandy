<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoCompra extends Model {

    protected $table = 'producto_compra';

    protected $primaryKey = 'pro_com_codigo';

    public $incrementing = false;
    
    public $autoincrement = false;

    public $timestamps = false;

    protected $fillable = [
        'pro_com_cantidad', 'pro_com_precio_producto', 'fk_presupuesto', 'fk_compra_web', 'fk_producto'];

    public function product(){
        return $this->belongsTo('App\Producto', 'pro_codigo');
    }
}
