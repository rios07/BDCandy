@extends('layouts.app')
@section('title', 'Productos')
@section('content')

    <div class="jumbotron text-center">
        <h1 class=""> {{$title}} </h1>
        <nav class="navbar navbar-light bg-light justify-content-between">

            <ul class="nav nav-pills">
                <li class="nav-item">  <a class="nav-link" href=" {{ url('/') }} "> <b>CandyUcab</b>   </a>     </li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('productos.create') }}">Nuevo Producto</a></li>  
                <li class="nav-item btn-nav-input" style="margin-left: 13%; margin-right: 5%;">
                    <form align="right" class="form-inline  my-100 my-lg-0">
                        <input  class="form-control " type="search" placeholder="Buscar" aria-label="search">
                        <button class="btn btn-outline-primary" type="submit">Buscar</button>
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

    @if ($productos->isNotEmpty())
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Nombre</th>
            <th scopre="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($productos as $producto)
        <tr>
            <td scope="row">{{ $producto->pro_nombre }}</td>
            <td>
                <form action="{{ route('productos.destroy', $producto) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <a href=" {{ route('productos.show', ['codigo' => $producto->pro_codigo]) }} " class="btn btn-outline-primary">Detalles</a>
                    <a href=" {{ route('productos.edit', ['codigo' => $producto->pro_codigo]) }} " class="btn btn-outline-primary">Modificar</a>                   
                    <button type="submit" class="btn btn-outline-primary">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <p>No hay productos registrados.</p>
    @endif
@endsection