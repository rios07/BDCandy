<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteNatural extends Model
{
    protected $table = 'ClienteNatural';
    private $rif;
    private $ci;
	private $nombre;
	private $apellido
	private $telefono;
	private $correo;

    public $timestamps = false;

}
