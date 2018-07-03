<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
    //
    public $timestamps = false;
    protected $table='medio_pago_tarjeta_credito';

    protected $primaryKey = 'med_pag_tar_cred_codigo';

    protected  $fillable=['med_pag_tar_cred_numero','med_pag_tar_cred_tipo',  'med_pag_tar_cred_banco','med_pag_tar_cred_fecha_vencimiento','fk_cliente_juridico', 'fk_cliente_natural'];

    public function ClienteNatural(){
        return $this->belongsTo('App\Debito','fk_cliente_natural','cli_nat_rif');
    }    
}