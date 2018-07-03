<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompraWeb extends Model {

	protected $table = 'compra_web';

    protected $primaryKey = 'com_web_codigo';

    public $incrementing = false;
    
    public $autoincrement = false;

    public $timestamps = false;

    protected $fillable = [
        'com_web_monto', 'com_fecha', 'fk_estatus', 'fk_tienda', 'fk_usuario'];

    public function detail(){
        return $this->hasMany('App\ProductoCompra', 'fk_compra_web', 'pro_com_codigo');
    }

    public function detail2(){
        return $this->hasMany('App\Pago', 'fk_compra_web', 'pag_codigo');
    }

    public function client(){
        return $this->belongsTo('App\Usuario', 'usu_codigo');
    }
}