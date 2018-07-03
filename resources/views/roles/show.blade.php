@extends('layouts.app') 
@section('title',"Rol: $rol->name")   
@section('content')
    <div class="row mt-3">
        <div class="col-8">
    	    <h1>Nombre del rol: {{$rol->name}}</h1>
            <p><strong>Privilegios: </strong></p>
            <br>
            @foreach ($privilegios as $privilegio)
            <p>Nombre: <strong>{{$privilegio->name}}</strong></p>
            @endforeach
    	    <p>
    	    	<a href="{{ route('roles') }}">Regresar al listado de roles</a>
    	    </p>
        </div>
    </div>
@endsection