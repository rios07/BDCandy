@extends('layouts.app') 
@section('title',"Cliente: $ClienteJuridico->cli_jur_denominacionComercial")   
@section('content')
    <div class="row mt-3">
        <div class="col-8">
    	    <h1>Nombre del cliente: {{$ClienteJuridico->cli_jur_denominacionComercial}}</h1> 
            <p>Rif: {{$ClienteJuridico->cli_jur_rif}}  Razon Social: {{  $ClienteJuridico->cli_jur_razon_social }}</p>
    	    <p>Correo Electronico: {{$ClienteJuridico->cli_jur_correoElectronico}}</p>
    	    <p>Pagina Web: <strong>{{ $ClienteJuridico->cli_jur_paginaWeb}}</strong></p>
            <p>Capital Disponible: <strong>{{  $ClienteJuridico->cli_jur_capitalDisponible }}</strong></p>
            <p>Direccion fiscal: {{$lugar->fk_lugarFiscal}}</p>
            <p>Direccion Fisica: {{$lugarb->fk_lugarPrincipal}}</p>
    	    <p>
    	    	<a href="/Clientes/ClienteJ">Regresar al listado de Clientes Juridicos</a>
    	    </p>
        </div>
    </div>
@endsection