@extends('layouts.app')
@section('title', 'Tiendas')
@section('content')

    <div class="jumbotron text-center">
        <h1 class=""> {{$title}} </h1>
        <nav class="navbar navbar-light bg-light justify-content-between">

            <ul class="nav nav-pills">
                <li class="nav-item">  <a class="nav-link" href=" {{ url('/') }} "> <b>CandyUcab</b>   </a>     </li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('tiendas.create') }}">Nueva Tienda</a></li>  
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

    @if ($tiendas->isNotEmpty())
    <table class="table table-striped" name="producto" id="tienda">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Rif</th>
            <th scope="col">Nombre</th>
            <th scopre="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($tiendas as $tienda)
        <tr>
            <td scope="row">{{ $tienda->tie_rif }}</td>
            <td scope="row">{{ $tienda->tie_nombre }}</td>
            <td scope="row">
                <form action="{{ route('tiendas.destroy', $tienda) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <a href=" {{ route('tiendas.show', ['codigo' => $tienda->tie_codigo]) }} " class="btn btn-info">Detalles</a>
                    <a href=" {{ route('tiendas.edit', ['codigo' => $tienda->tie_codigo]) }} " class="btn btn-primary">Modificar</a>                   
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
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