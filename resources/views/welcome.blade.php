@extends('layouts.app')

@section('title', 'Inicio')

@section('content')

    <div class="jumbotron text-center" style="background-image: url('http://localhost/BDCandy/public/image/fondo2.jpg'); background-repeat: repeat-x; background-position: center; background-size: 40%; width: 100%;">
        <h1 class="display-2"><b> CandyUcab  </b>  </h1>       
            <ul class="nav nav-pills">                               
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Registro') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a></li>                    
                @else
                    @hasrole('administrador')
                    @can('total')
                    <li class="nav-item">  <a class="nav-link" href="{{ route('tiendas') }}"><b>Tiendas</b></a></li>
                    <li class="nav-item">  <a class="nav-link" href="{{ url('/Clientes') }}"><b>Clientes</b> </a></li>
                    <li class="nav-item">  <a class="nav-link" href="{{ route('productos') }}"><b>Productos</b> </a></li>
                    <li class="nav-item">  <a class="nav-link" href="{{ route('comprasweb.add')}}"><b>Comprar</b> </a></li>         
                    <li class="nav-item">  <a class="nav-link" href="{{ route('ofertas')}}"><b>Ofertas</b></a></li>
                    <li class="nav-item">  <a class="nav-link" href="{{ url('/puntos')}}"><b>Puntos</b></a></li>
                    <li class="nav-item">  <a class="nav-link" href="{{ route('pedidos') }}"><b>Pedidos de clientes</b></a></li>
                    <li class="nav-item">  <a class="nav-link" href="{{ route('usuarios')}}"><b>Usuarios</b></a></li>
                    <li class="nav-item">  <a class="nav-link" href="{{ route('comprastienda',['codigo' => Auth::user()->fk_empleado]) }}"><b>Compra en tienda</b> </a></li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle-lg" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                    @endcan
                    @endrole
                    @hasrole('empleado jefe de tienda')
                    @can('create cliente_natural')
                    <li class="nav-item">  <a class="nav-link" href="{{ route('tiendas') }}"><b>Tiendas</b></a></li>
                    <li class="nav-item">  <a class="nav-link" href="{{ url('/Clientes') }}"><b>Clientes</b> </a></li>
                    <li class="nav-item">  <a class="nav-link" href="{{ route('productos') }}"><b>Productos</b> </a></li>             
                    <li class="nav-item">  <a class="nav-link" href="{{ route('ofertas')}}"><b>Ofertas</b></a></li>
                    <li class="nav-item">  <a class="nav-link" href="{{ url('/puntos')}}"><b>Puntos</b></a></li>
                    <li class="nav-item">  <a class="nav-link" href="{{ route('pedidos') }}"><b>Pedidos de clientes</b></a></li>
                    <li class="nav-item">  <a class="nav-link" href="{{ route('usuarios')}}"><b>Usuarios</b></a></li>
                    <li class="nav-item">  <a class="nav-link" href="{{ route('comprastienda',['codigo' => Auth::user()->fk_empleado]) }}"><b>Compra en tienda</b> </a></li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle-lg" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                    @endcan
                    @endrole
                    @role('empleado area compras internas')
                    @can('alter tienda')
                    <li class="nav-item">  <a class="nav-link" href="{{ route('tiendas') }}"><b>Tiendas</b></a></li>
                    <li class="nav-item">  <a class="nav-link" href="{{ route('pedidos') }}"><b>Pedidos de clientes</b></a></li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle-lg" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                    @endcan
                    @endrole
                    @role('empleado despacho')
                    @can('create orden_despacho')                    
                    <li class="nav-item">  <a class="nav-link" href="{{ route('pedidos') }}"><b>Pedidos de clientes</b></a></li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle-lg" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                    @endcan
                    @endrole
                    @role('empleado de ventas')
                    @can('create compra_tienda')
                    <li class="nav-item">  <a class="nav-link" href="{{ route('comprastienda',['codigo' => Auth::user()->fk_empleado]) }}"><b>Compra en tienda</b> </a></li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle-lg" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                    @endcan
                    @endrole
                    @role('empleado gerente de promociones')
                    @can('create ofer_pro')
                    @can('create punto')
                    <li class="nav-item">  <a class="nav-link" href="{{ route('ofertas')}}"><b>Ofertas</b></a></li>
                    <li class="nav-item">  <a class="nav-link" href="{{ url('/puntos')}}"><b>Puntos</b></a></li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle-lg" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                    @endcan
                    @endcan
                    @endhasanyrole
                    @hasanyrole('cliente juridico|cliente natural')
                    @can('create compra_web')
                    <li class="nav-item">  <a class="nav-link" href="{{ route('tiendas') }}"><b>Tiendas</b></a></li>
                    <li class="nav-item">  <a class="nav-link" href="{{ route('productos') }}"><b>Productos</b> </a></li>                
                    <li class="nav-item">  <a class="nav-link" href="{{ route('comprasweb.add')}}"><b>Comprar</b> </a></li>                
                    <li class="nav-item">  <a class="nav-link" href="{{ route('ofertas')}}"><b>Ofertas</b></a></li>
                    <li class="nav-item">  <a class="nav-link" href="{{ route('facturas', [ 'codigo' => Auth::user()->usu_codigo]) }}"><b>Facturas</b> </a></li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle-lg" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                    @endcan
                    @endhasanyrole                 
                @endguest                               
            </ul>
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