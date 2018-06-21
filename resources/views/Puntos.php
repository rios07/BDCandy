<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puntos extends Model
{
    //
    public $incrementing = false;
    public $autoincrement = false;
    public $timestamps = false;

    protected $table = 'punto';
	protected $primaryKey = 'pun_codigo';
	private $pun_valor;
	private $pun_fecha_inicio; 
	private $pun_fecha_fin;
}
