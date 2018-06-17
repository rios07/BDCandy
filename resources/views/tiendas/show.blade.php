@extends('layouts.app') 
@section('title',"Tienda: $tienda->tie_nombre")   
@section('content')
    <div class="row mt-3">
        <div class="col-8">
    	    <h1>Nombre de la tienda: {{$tienda->tie_nombre}}</h1> 
            <p>Rif: {{$tienda->tie_rif}} </p>
    	    <p>Descripción: <strong>{{$tienda->tie_descripcion}}</strong></p>
    	    <p>Tipo: <strong>{{$tienda->tie_tipo}}</strong></p>
            <p>Lugar: {{$lugar->lug_nombre}}</p>
    	    <p>
    	    	<a href="{{ route('tiendas') }}">Regresar al listado de tiendas</a>
    	    </p>
        </div>
    </div>
@endsection