@extends('layouts.app') 
@section('title',"Producto: $producto->pro_nombre")   
@section('content')
    <div class="row mt-3">
        <div class="col-8">
    	    <h1>Nombre del producto: {{$producto->pro_nombre}}</h1> 
            <p>Descripción: {{$producto->pro_descripcion}} </p>
    	    <p>Sabor: <strong>{{$producto->pro_sabor}}</strong></p>
    	    <p>Relleno: <strong>{{$producto->pro_relleno}}</strong></p>
            <p>Color: {{$producto->pro_color}} </p>
            <p>Tipo de producto: {{$tipo_producto->tip_pro_nombre}}</p>
    	    <p>
    	    	<a href="{{ route('productos') }}">Regresar al listado de productos</a>
    	    </p>
        </div>
    </div>
@endsection