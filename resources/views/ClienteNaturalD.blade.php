@extends('layouts.app') 
@section('title',"Cliente: $ClienteNatural->cli_nat_ci")   
@section('content')
    <div class="row mt-3">
        <div class="col-8">
    	    <h1>Ci del cliente: {{$ClienteNatural->cli_nat_ci}}</h1> 
            <p>Rif: {{$ClienteNatural->cli_nat_rif}}  </p>
    	    <p>Nombres:{{ $ClienteNatural->clie_nat_primer_nombre }},{{ $ClienteNatural->cli_nat_segundo_nombre }}</p>
            <p>Apellidos:{{ $ClienteNatural->cli_nat_primer_apellido}},{{ $ClienteNatural->cli_nat_segundo_apellido  }} </p>
            <p>Correo Electronico: {{ $ClienteNatural->cli_nat_correo_electronico}}</p>
            <p>Direccion fiscal: {{$lugar->nombre}}</p>          
    	    <p>
    	    	<a href="{{url()->previous()}}">Regresar al listado de Clientes Naturales</a>
    	    </p>
        </div>
    </div>
@endsection