<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $table = 'oferta';

    protected $primaryKey = 'ofe_codigo';

    public $incrementing = false;
    
    public $autoincrement = false;

    public $timestamps = false;

    protected $fillable = ['ofe_fecha_inicio','ofe_fecha_final'];

    public function productos()
    {
        return $this->belongsToMany('App\Producto','ofer_pro','fk_oferta','fk_producto')->withPivot('ofer_pro_valor');
    }
}
