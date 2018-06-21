<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompraWeb extends Model {

	protected $table = 'compra_web';

    protected $primaryKey = 'com_web_codigo';

    public $incrementing = false;
    
    public $autoincrement = false;

    public $timestamps = false;

    public function detail(){
        return $this->hasMany('App\ProductoCompra', 'fk_producto_compra');
    }

    public function client(){
        return $this->belongsTo('App\Usuario', 'usu_codigo');
    }
}