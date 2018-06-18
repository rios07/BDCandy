<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteJuridico extends Model
{
    //
      public $incrementing = false;
     public $autoincrement = false;
    public $timestamps = false;

	protected $table = 'cliente_juridico';
	protected $primaryKey = 'cli_jur_rif';
	private $cli_jur_denominacion_fiscal;
	private $cli_jur_pagina_web;
	private $cli_jur_capital_disponible;
	private $cli_jur_correo_electronico;
	private $cli_jur_razon_social;
	private $fk_lugar;

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