@extends('layouts.app')

@section('content')

    <div class="jumbotron text-center">
        <h1 class="display-1"> CandyUcab </h1>
        <nav>
            <ul class="nav nav-pills">
                <li class="nav-item">  <a class="nav-link" href="/">Home</a>     </li>
                <li class="nav-item"> <a class="nav-link" href="/acerca">Tiendas</a></li>
                <li class="nav-item">  <a class="nav-link" href="Clientes">Clientes </a></li>
                <li class="nav-item">  <a class="nav-link" href="Productos">Productos </a></li>
                <li class="nav-item">  <a class="nav-link" href="Pedidos">Pedidos </a></li>
                
               
               
               

            </ul>
        </nav>
        <div class="row">
            @foreach ($mensajes as $mensaje)
            <div class="col-6">
                <img class="img-thumbnail" src="
                   {{ asset( $mensaje['imagen'] ) }}  ">
                <p class="card-text"> 
                    {{ $mensaje['contenido'] }}
                    <a href="/mensajes/{{ $mensaje['id']  }}">
                       Leer mas     
                    </a>
                </p>
            </div>
            @endforeach
        </div>
    </div>
@endsection