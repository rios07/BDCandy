<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteJuridico extends Model
{
    //
      public $incrementing = false;
     public $autoincrement = false;
    public $timestamps = false;

	protected $table = 'ClienteJuridico';
	protected $primaryKey = 'cli_jur_rif';
	private $cli_jur_denominacionComercial;
	private $cli_jur_paginaWeb;
	private $cli_jur_capitalDisponible;
	private $cli_jur_correoElectronico;
	private $cli_jur_razon_social;
	private $fk_lugarFiscal;
	private $fk_lugarPrincipal;

	public function Debito(){
		return $this->hasMany('App\Debito','fk_cliente_juridico');//local key rif en esta id
	}
	public function Credito(){
		return $this->hasMany('App\Credito','fk_cliente_juridico');

	}
	public function Cheque(){
		return $this->hasMany('App\Cheque','fk_cliente_juridico');

	}

}