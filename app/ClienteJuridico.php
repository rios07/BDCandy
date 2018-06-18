<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteJuridico extends Model
{
    //
	protected $table = 'ClienteJuridico';

    private $rif;
	private $denominacionFiscal;
	private $paginaWeb;
	private $capitalDisponible;
	private $contacto;
	private $telefono;
	private $correo;

    public $timestamps = false;


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
