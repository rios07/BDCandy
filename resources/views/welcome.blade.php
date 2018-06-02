@extends('layouts.app')

@section('content')

    <div class="jumbotron text-center">
        <h1 class="display-2"><b> CandyUcab  </b>  </h1>
      
        <nav>
            <ul class="nav nav-pills">
                <li class="nav-item">  <a class="nav-link" href="/"> <b>CandyUcab</b>      </a>     </li>
                    <li class="nav-item">  <a class="nav-link" href="/Acerca de Nosotros"> <b>Acerca de Nosotros</b>      </a>     </li>
                <li class="nav-item">  <a class="nav-link" href="/Tienda"><b>Tiendas</b></a></li>
                <li class="nav-item">  <a class="nav-link" href="/Clientes"><b>Clientes</b> </a></li>
                <li class="nav-item">  <a class="nav-link" href="/Productos"><b>Productos</b> </a></li>
                <li class="nav-item">  <a class="nav-link" href="/Pedidos"><b>Pedidos</b> </a></li>
                <li class="nav-item">  <a class="nav-link "href="/Promociones"><b>Promociones</b></a></li>
                <li class="nav-item">  <a class="nav-link "href="/Registro"><b>Registro</b></a></li>
            </ul>
        </nav>
    </div>  

    <div class="row">
        @foreach ($mensajes as $mensaje)
        <div class="col-6">
            <img class="img-thumbnail" src="
               {{ asset( $mensaje['imagen'] ) }}  ">
            <p class="card-text"> <b>
                {{ $mensaje['contenido'] }}
                </b>
            </p>
        </div>
        @endforeach
    </div>
@endsection
