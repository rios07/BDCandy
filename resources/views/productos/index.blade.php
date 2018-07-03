@extends('layouts.app')
@section('title', 'Productos')
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

    @if ($productos->isNotEmpty())
    <table class="table table-striped" name="producto" id="producto">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Imagen</th>
            <th scope="col" class="col-sm-6 text-center">Nombre</th>
            <th scope="col" class="col">Precio</th>
            <th scope="col" >Detalles</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productos as $producto)
        <tr>
            <td scope="row"><img src="{{ asset('image/'.$producto->pro_imagen)}}" height="75" width="80" ></td>
            <td scope="row" class="text-center">{{ $producto->pro_nombre }}</td>
            <td scope="row">{{ $producto->pro_precio }}</td>
            <td>
                <a href=" {{ route('productos.show', ['codigo' => $producto->pro_codigo]) }} " class="btn btn-info">Detalles</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <p>No hay productos registrados.</p>
    @endif               
                @endcan
                @can('total')
                <li class="nav-item">  <a class="nav-link" href=" {{ url('/') }} "> <b>CandyUcab</b>   </a>     </li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('productos.create') }}">Nuevo Producto</a></li>  
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

    @if ($productos->isNotEmpty())
    <table class="table table-striped" name="producto" id="producto">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Imagen</th>
            <th scope="col" class="col-sm-6 text-center">Nombre</th>
            <th scope="col" class="col">Precio</th>
            <th scope="col" >Detalles</th>
            <th scope="col" >Modificar</th>
            <th scopre="col">Eliminar</th>   
        </tr>
        </thead>
        <tbody>
        @foreach($productos as $producto)
        <tr>
            <td scope="row"><img src="{{ asset('image/'.$producto->pro_imagen)}}" height="75" width="80" ></td>
            <td scope="row" class="text-center">{{ $producto->pro_nombre }}</td>
            <td scope="row">{{ $producto->pro_precio }}</td>
            <td>
                <a href=" {{ route('productos.show', ['codigo' => $producto->pro_codigo]) }} " class="btn btn-info">Detalles</a>
            </td>
            <td>
                <a href=" {{ route('productos.edit', ['codigo' => $producto->pro_codigo]) }} " class="btn btn-primary">Modificar</a>
            </td>
            <td>
                <form action="{{ route('productos.destroy', $producto) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}               
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <p>No hay productos registrados.</p>
    @endif
        @endcan
        @can('create cliente_natural')
            <li class="nav-item">  <a class="nav-link" href=" {{ url('/') }} "> <b>CandyUcab</b>   </a>     </li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('productos.create') }}">Nuevo Producto</a></li>  
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

    @if ($productos->isNotEmpty())
    <table class="table table-striped" name="producto" id="producto">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Imagen</th>
            <th scope="col" class="col-sm-6 text-center">Nombre</th>
            <th scope="col" class="col">Precio</th>
            <th scope="col" >Detalles</th>
            <th scope="col" >Modificar</th>
            <th scopre="col">Eliminar</th>   
        </tr>
        </thead>
        <tbody>
        @foreach($productos as $producto)
        <tr>
            <td scope="row"><img src="{{ asset('image/'.$producto->pro_imagen)}}" height="75" width="80" ></td>
            <td scope="row" class="text-center">{{ $producto->pro_nombre }}</td>
            <td scope="row">{{ $producto->pro_precio }}</td>
            <td>
                <a href=" {{ route('productos.show', ['codigo' => $producto->pro_codigo]) }} " class="btn btn-info">Detalles</a>
            </td>
            <td>
                <a href=" {{ route('productos.edit', ['codigo' => $producto->pro_codigo]) }} " class="btn btn-primary">Modificar</a>
            </td>
            <td>
                <form action="{{ route('productos.destroy', $producto) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}               
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <p>No hay productos registrados.</p>
    @endif
        @endcan
@endsection
@section ('bottom')
@endsection
