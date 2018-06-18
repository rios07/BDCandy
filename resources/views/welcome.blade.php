@extends('layouts.app')

@section('title', 'Inicio')

@section('content')

    <div class="jumbotron text-center">
        <h1 class="display-2"><b> CandyUcab  </b>  </h1>
      
        <nav>
            <ul class="nav nav-pills">
                <li class="nav-item">  <a class="nav-link" href="/Acerca de Nosotros"> <b>Acerca de Nosotros</b>      </a>     </li>
                <li class="nav-item">  <a class="nav-link" href="{{ route('tiendas') }}"><b>Tiendas</b></a></li>
                <li class="nav-item">  <a class="nav-link" href="{{ url('/Clientes') }}"><b>Clientes</b> </a></li>
                <li class="nav-item">  <a class="nav-link" href="{{ route('productos') }}"><b>Productos</b> </a></li>
                <li class="nav-item">  <a class="nav-link" href="/Pedidos"><b>Pedidos</b> </a></li>
                <li class="nav-item">  <a class="nav-link "href="/Promociones"><b>Promociones</b></a></li>
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a></li>                    
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->usu_nombre }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest                
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