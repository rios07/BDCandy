@extends('layouts.app')
@section('title', 'Tiendas')
@section('content')

    <div class="jumbotron text-center" style="background-image: url('http://localhost/BDCandy/public/image/fondo2.jpg'); background-repeat: repeat-x; background-position: center; background-size: 40%;">
        <h1 class=""> {{$title}} </h1>
        <nav class="navbar navbar-light bg-light justify-content-between">

            <ul class="nav nav-pills">
                @can('create compra_tienda')
                <li class="nav-item">  <a class="nav-link" href=" {{ url('/') }} "> <b>CandyUcab</b>   </a>     </li>                  
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

    @if ($tiendas->isNotEmpty())
    <table class="table table-striped" name="producto" id="tienda">
        <thead class="thead-dark">
        <tr>
            <th scope="col" class="col-sm-3">Rif</th>
            <th scope="col" class="col-sm-4">Nombre</th>
            <th scope="col" class="col-sm-2">Ubicación (Parroquia)</th>
            <th scope="col" >Detalles</th> 
        </tr>
        </thead>
        <tbody>
        @foreach($tiendas as $tienda)
        <tr>
            <td scope="row">{{ $tienda->tie_rif }}</td>
            <td scope="row">{{ $tienda->tie_nombre }}</td>
            @foreach($lugares as $lugar)
                @if($lugar->lug_codigo==$tienda->fk_lugar)
                    <td scope="row">{{$lugar->lug_nombre}}</td>
                    @break
                @endif
            @endforeach
            <td>
                <a href=" {{ route('tiendas.show', ['codigo' => $tienda->tie_codigo]) }} " class="btn btn-info">Detalles</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <p>No hay tiendas registrados.</p>
    @endif
                @endcan
                @can('alter tienda')
                <li class="nav-item">  <a class="nav-link" href=" {{ url('/') }} "> <b>CandyUcab</b>   </a>     </li>                  
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

    @if ($tiendas->isNotEmpty())
    <table class="table table-striped" name="producto" id="tienda">
        <thead class="thead-dark">
        <tr>
            <th scope="col" class="col-sm-3">Rif</th>
            <th scope="col" class="col-sm-4">Nombre</th>
            <th scope="col" class="col-sm-2">Ubicación (Parroquia)</th>
            <th scope="col" >Detalles</th> 
        </tr>
        </thead>
        <tbody>
        @foreach($tiendas as $tienda)
        <tr>
            <td scope="row">{{ $tienda->tie_rif }}</td>
            <td scope="row">{{ $tienda->tie_nombre }}</td>
            @foreach($lugares as $lugar)
                @if($lugar->lug_codigo==$tienda->fk_lugar)
                    <td scope="row">{{$lugar->lug_nombre}}</td>
                    @break
                @endif
            @endforeach
            <td>
                <a href=" {{ route('tiendas.show', ['codigo' => $tienda->tie_codigo]) }} " class="btn btn-info">Detalles</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <p>No hay tiendas registrados.</p>
    @endif
                @endcan
                @can('total')
                <li class="nav-item">  <a class="nav-link" href=" {{ url('/') }} "> <b>CandyUcab</b>   </a>     </li>                
                <li class="nav-item"> <a class="nav-link" href="{{ route('tiendas.create') }}">Nueva Tienda</a></li>  
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

    @if ($tiendas->isNotEmpty())
    <table class="table table-striped" name="producto" id="tienda">
        <thead class="thead-dark">
        <tr>
            <th scope="col" class="col-sm-3">Rif</th>
            <th scope="col" class="col-sm-4">Nombre</th>
            <th scope="col" class="col-sm-2">Ubicación (Parroquia)</th>
            <th scope="col" >Detalles</th>
            <th scope="col" >Modificar</th>
            <th scopre="col">Eliminar</th>   
        </tr>
        </thead>
        <tbody>
        @foreach($tiendas as $tienda)
        <tr>
            <td scope="row">{{ $tienda->tie_rif }}</td>
            <td scope="row">{{ $tienda->tie_nombre }}</td>
            @foreach($lugares as $lugar)
                @if($lugar->lug_codigo==$tienda->fk_lugar)
                    <td scope="row">{{$lugar->lug_nombre}}</td>
                    @break
                @endif
            @endforeach
            <td>
                <a href=" {{ route('tiendas.show', ['codigo' => $tienda->tie_codigo]) }} " class="btn btn-info">Detalles</a>
            </td>
            <td >
                <a href=" {{ route('tiendas.edit', ['codigo' => $tienda->tie_codigo]) }} " class="btn btn-primary pull-middle">Modificar</a>  
            </td>
            <td >
                <form action="{{ route('tiendas.destroy', $tienda) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}                                     
                    <button type="submit" class="btn btn-danger pull-left">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <p>No hay tiendas registrados.</p>
    @endif
    @endcan
@endsection
@section ('bottom')
@endsection