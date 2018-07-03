@extends('layouts.app') 
@section('title',"Detalles del usuario")   
@section('content')
    <div class="row mt-3">
        <div class="col-8">
            <h1>Nombre de usuario: {{$usuario->usu_nombre}} </h1>
            @foreach($roles as $rol)
                @if($rol->id == $usuario->fk_rol)
                    <p>Rol de usuario: <strong>{{$rol->name}}</strong></p>
                    @break;
                @endif
            @endforeach
                @if(isset($datos->cli_jur_rif))
    	           <p>Nombre del cliente juridico: <strong>{{$datos->cli_jur_denominacion_fiscal}}</strong></p>
                   <p>Rif del cliente: <strong>{{$datos->cli_jur_rif}}</strong> </p> 
                @endif
                @if (isset($datos->cli_nat_rif))
                    <p>Nombre del cliente natural: <strong>{{$datos->clie_nat_primer_nombre}} {{$datos->cli_nat_segundo_nombre}} {{$datos->cli_nat_primer_apellido}} {{$datos->cli_nat_segundo_apellido}}</strong></p>
                    <p>Rif del cliente: <strong>{{$datos->cli_nat_rif}}</strong> </p>
                @endif
                @if (isset($datos->emp_codigo))
                    <p>Nombre del empleado: <strong>{{$datos->emp_nombre}}</strong></p>
                    <p>Cedula del empleado: <strong>{{$datos->emp_cedula}}</strong> </p> 
                @endif                       
    	    <p>
    	    	<a href="{{ route('usuarios') }}">Regresar al listado de productos</a>
    	    </p>
        </div>
    </div>
@endsection