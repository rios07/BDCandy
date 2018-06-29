<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pago';

    protected $primaryKey = 'pag_codigo';

    public $incrementing = false;
    
    public $autoincrement = false;

    public $timestamps = false;

    protected $fillable = [
        'pag_monto', 'pag_fecha', 'fk_compra_web', 'fk_medio_pago_tarjeta_credito', 'fk_tienda', 'fk_medio_pago_tarjeta_debito', 'fk_medio_pago_cheque', 'fk_compra_tienda'];
}
