<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompraTienda extends Model
{
    protected $table = 'compra_tienda';

    protected $primaryKey = 'com_tie_codigo';

    public $incrementing = false;
    
    public $autoincrement = false;

    public $timestamps = false;

    protected $fillable = [
        'com_tie_fecha', 'com_tie_punto_ganado', 'com_tie_monto', 'fk_tienda', 'fk_cliente_natural', 'fk_cliente_juridico', 'fk_punto'];
}
