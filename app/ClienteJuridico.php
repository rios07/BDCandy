<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteJuridico extends Model
{
    //
<<<<<<< HEAD
	protected $table = 'ClienteJuridico';
=======

>>>>>>> francisco
    private $rif;
	private $denominacionFiscal;
	private $paginaWeb;
	private $capitalDisponible;
	private $contacto;
	private $telefono;
	private $correo;

<<<<<<< HEAD
    public $timestamps = false;


=======
	public function __construct($rif, $denominacionFiscal, $paginaWeb,$capitalDisponible,$contacto,$correo,$telefono){
		$this->rif = $rif;
		$this->denominacionFiscal = $denominacionFiscal;
		$this->paginaWeb = $paginaWeb;
		$this->capitalDisponible = $capitalDisponible;
		$this->contacto = $contacto;
		$this->correo = $correo;
		$this->telefono=$telefono;
	}
>>>>>>> francisco

	public function getRif(){
		return $this->rif;
	}

	public function setRif($rif){
		 $this->rif = $rif;
	}

	public function getDenominacionFiscal(){
		return $this->denominacionFiscal;
	}

	public function setDenominacionFiscal($denominacionFiscal){
		$this->denominacionFiscal = $denominacionFiscal;
		
	}

	public function getPaginaWeb(){
		return $this->paginaWeb;
	}

	public function setPaginaWeb($paginaWeb){
		 $this->paginaWeb = $paginaWeb;
	}

	public function getCapitalDisponible(){
		return $this->capitalDisponible;
	}

	public function setCapitalDisponible($capitalDisponible){
		 $this->capitalDisponible = $capitalDisponible;
	}

	public function getContacto(){
		return $this->contacto;
	}

	public function setContacto($contacto){
		 $this->contacto = $contacto;
	}

	public function getCorreo(){
		return $this->correo;
	}

	public function setCorreo($correo){
		 $this->correo = $correo;
	}

	public function getTelefono(){
		return $this->telefono;
	}

	public function setTelefono($telefono){
		 $this->telefono = $telefono;
	}
 
}
