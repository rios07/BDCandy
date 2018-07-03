@extends('layouts.app')
@section('title', 'Lista de pedidos')
@section('content')

    <div class="jumbotron text-center" style="background-image: url('http://localhost/BDCandy/public/image/fondo2.jpg'); background-repeat: repeat-x; background-position: center; background-size: 40%;">
        <h1 class="">{{$tienda->tie_rif}} - {{$tienda->tie_nombre}} </h1>
        <nav class="navbar navbar-light bg-light justify-content-between">

            <ul class="nav nav-pills">
                <li class="nav-item">  
                    <a class="nav-link" href=" {{ route('tiendas.show',['codigo' => $tienda->tie_codigo]) }} "> <b>Regresar a la tienda</b></a> 
                </li>
                @guest           
                @else
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
                @endguest
            </ul>
    </div>

    @if ($pedidos->isNotEmpty())
    <table class="table table-striped" name="producto" id="pedido">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Número de pedido</th>
            <th scope="col">Producto</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Fecha de emisión</th>
            <th scope="col">Fecha de entregado</th>
            <th scope="col">Estatus</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($pedidos as $pedido)
        <tr>
            <td scope="row">{{ $pedido->ped_tie_codigo}}</td>
            <td scope="row">{{ $pedido->pro_nombre }}</td>
            <td scope="row">{{ $pedido->ped_tie_cantidad}}</td>
            <td scope="row">{{ $pedido->ped_tie_fecha_emision }}</td>
            <td scope="row">{{ $pedido->ped_tie_fecha_entrega }}</td>
            @foreach($estatus as $estatu)
                @if($estatu->est_codigo == $pedido->fk_estatus)
                    <td scope="row">{{ $estatu->est_tipo}}</td>
                @break
                @endif
            @endforeach
            <td scope="row">
                <a href=" {{ route('tiendas.cambioEstatus', ['codigo' => $pedido->ped_tie_codigo])}} " class="btn btn-primary">Cambiar estatus</a>                   
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <p>No hay tiendas registrados.</p>
    @endif
@endsection
@section ('bottom')
@endsection