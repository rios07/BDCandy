<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ClienteNatural extends Model
{
	public $incrementing = false;
    public $autoincrement = false;
    public $timestamps = false;

    protected $table = 'cliente_natural';
	protected $primaryKey = 'cli_nat_rif';
	private $cli_nat_correo_electronico;
	private $cli_nat_ci; 
	private $cli_nat_primer_nombre;
	private $cli_nat_segundo_nombre;
	private $cli_nat_primer_apellido;
	private $cli_nat_segundo_apellido;
	private $fk_lugar;  
}


