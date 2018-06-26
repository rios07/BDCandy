@extends('layouts.app')
@section('title', 'Pedidos')
@section('content')

    <div class="jumbotron text-center" style="background-image: url('http://localhost/BDCandy/public/image/fondo2.jpg'); background-repeat: repeat-x; background-position: center; background-size: 40%;">
        <h1 class=""> {{$title}} </h1>
        <nav class="navbar navbar-light bg-light justify-content-between">
            <ul class="nav nav-pills">
                <li class="nav-item">  <a class="nav-link" href=" {{ url('/') }} "> <b>CandyUcab</b>   </a>     </li>
                <li class="nav-item btn-nav-input" style="margin-left: 13%; margin-right: 5%;">
                    <form align="right" class="form-inline  my-100 my-lg-0">
                        <input  class="form-control " type="search" placeholder="Buscar" aria-label="search">
                        <button class="btn btn-success" type="submit">Buscar</button>
                    </form>
                </li> 
                @guest            
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
    </div>

    @if ($comprasweb->isNotEmpty())
    <table class="table table-striped" name="compraweb" id="compraweb">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Numero de pedido</th>
            <th scope="col">Usuario</th>            
            <th scope="col">Cantidad</th>
            <th scope="col">Fecha</th> 
            <th scope="col">Estatus</th>           
        </tr>
        </thead>
        <tbody>
        @foreach($comprasweb as $compraweb)
        <tr>
            <td scope="row">{{ $compraweb->com_web_codigo}}</td>
            <td scope="row">{{ $compraweb->usu_nombre}}</td>
            <td scope="row">{{ $compraweb->com_fecha}}</td>
            @foreach($status as $k => $v)
            @if(($v->com_web_codigo) == ($compraweb->com_web_codigo))
            <td scope="row">{{$v->est_nombre}}</td>
            @break
            @endif
            @endforeach
            <td scope="row">
                    <a href=" {{ route('pedidos.edit', ['codigo' => $compraweb->com_web_codigo]) }} " class="btn btn-primary">Cambiar estatus</a>                   
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <p>No hay pedidos registrados.</p>
    @endif
@endsection