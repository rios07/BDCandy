@extends('layouts.app')
@section('title', 'Ofertas')
@section('content')

    <div class="jumbotron text-center" style="background-image: url('http://localhost/BDCandy/public/image/fondo2.jpg'); background-repeat: repeat-x; background-position: center; background-size: 40%;">
        <h1 class=""> {{$title}} </h1>
        <nav class="navbar navbar-light bg-light justify-content-between">

            <ul class="nav nav-pills">
                @can('create compra_web')
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

    @if ($promociones->isNotEmpty())
    <table class="table table-striped" name="promocion" id="promocion">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Producto</th>
            <th scope="col">Valor</th>
            <th scope="col">Fecha de inicio</th>
            <th scope="col">Fecha de expiración</th>
        </tr>
        </thead>
        <tbody>
        @foreach($promociones as $key => $value)
        <tr>
            <td scope="row">{{ $value->pro_nombre }}</td>
            <td scope="row">{{ $value->ofe_pro_valor }}</td>
            @foreach($ofertas as $k => $v)
            @if(($v->ofe_pro_codigo) == ($value->ofe_pro_codigo))
                <td scope="row">{{$v->ofe_fecha_inicio}}</td>
                <td scope="row">{{$v->ofe_fecha_final}}</td>
            @break
            @endif
            @endforeach
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <p>No hay ofertas registrados.</p>
    @endif
                @endcan
                @can('create ofer_pro')
                <li class="nav-item">  <a class="nav-link" href=" {{ url('/') }} "> <b>CandyUcab</b>   </a>     </li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('ofertas.create')}}">Nueva Oferta</a></li> 
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

    @if ($promociones->isNotEmpty())
    <table class="table table-striped" name="promocion" id="promocion">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Producto</th>
            <th scope="col">Valor</th>
            <th scope="col">Fecha de inicio</th>
            <th scope="col">Fecha de expiración</th>
        </tr>
        </thead>
        <tbody>
        @foreach($promociones as $key => $value)
        <tr>
            <td scope="row">{{ $value->pro_nombre }}</td>
            <td scope="row">{{ $value->ofe_pro_valor }}</td>
            @foreach($ofertas as $k => $v)
            @if(($v->ofe_pro_codigo) == ($value->ofe_pro_codigo))
                <td scope="row">{{$v->ofe_fecha_inicio}}</td>
                <td scope="row">{{$v->ofe_fecha_final}}</td>
            @break
            @endif
            @endforeach
            <td scope="row">
                <form action="{{ route('ofertas.destroy', $value->ofe_pro_codigo) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <a href=" {{ route('ofertas.edit', ['codigo' => $value->ofe_pro_codigo]) }} " class="btn btn-primary">Modificar</a>                   
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <p>No hay ofertas registrados.</p>
    @endif
                @endcan
                @can('total')
                <li class="nav-item">  <a class="nav-link" href=" {{ url('/') }} "> <b>CandyUcab</b>   </a>     </li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('ofertas.create')}}">Nueva Oferta</a></li> 
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

    @if ($promociones->isNotEmpty())
    <table class="table table-striped" name="promocion" id="promocion">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Producto</th>
            <th scope="col">Valor</th>
            <th scope="col">Fecha de inicio</th>
            <th scope="col">Fecha de expiración</th>
        </tr>
        </thead>
        <tbody>
        @foreach($promociones as $key => $value)
        <tr>
            <td scope="row">{{ $value->pro_nombre }}</td>
            <td scope="row">{{ $value->ofe_pro_valor }}</td>
            @foreach($ofertas as $k => $v)
            @if(($v->ofe_pro_codigo) == ($value->ofe_pro_codigo))
                <td scope="row">{{$v->ofe_fecha_inicio}}</td>
                <td scope="row">{{$v->ofe_fecha_final}}</td>
            @break
            @endif
            @endforeach
            <td scope="row">
                <form action="{{ route('ofertas.destroy', $value->ofe_pro_codigo) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <a href=" {{ route('ofertas.edit', ['codigo' => $value->ofe_pro_codigo]) }} " class="btn btn-primary">Modificar</a>                   
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <p>No hay ofertas registrados.</p>
    @endif 
        @endcan
@endsection