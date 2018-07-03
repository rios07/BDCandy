@extends('layouts.app')
@section('title', 'Usuarios')
@section('content')

    <div class="jumbotron text-center" style="background-image: url('http://localhost/BDCandy/public/image/fondo2.jpg'); background-repeat: repeat-x; background-position: center; background-size: 40%;">
        <h1 class=""> {{$title}} </h1>
        <nav class="navbar navbar-light bg-light justify-content-between">

            <ul class="nav nav-pills">
                <li class="nav-item">  <a class="nav-link" href=" {{ url('/') }} "> <b>CandyUcab</b>   </a>     </li>
                <li class="nav-item">  <a class="nav-link" href=" {{ route('roles') }} "> <b>Roles</b>   </a>     </li>
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

    @if ($usuarios->isNotEmpty())
    <table class="table table-striped" name="producto" id="producto">
        <thead class="thead-dark">
        <tr>
            <th scope="col" class="col-sm-2 text-center">Codigo de usuario</th>
            <th scope="col" class="col-sm-4 text-center">Nombre</th>
            <th scope="col" class="col-sm-3 text-center">Rol</th>
            <th scope="col" >Detalles</th>
            <th scope="col"  >Modificar</th>
            <th scopre="col" >Eliminar</th>   
        </tr>
        </thead>
        <tbody>
        @foreach($usuarios as $usuario)
        <tr>
            <td scope="row" class="text-center">{{ $usuario->usu_codigo }}</td>
            <td scope="row" class="text-center">{{ $usuario->usu_nombre }}</td>
            @foreach($roles as $rol)
                @if($rol->id == $usuario->fk_rol)
                    <td scope="row" class="text-center">{{$rol->name}}</td>
                    @break;
                @endif
                @if ($usuario->fk_rol == null)
                    <td scope="row"></td>
                    @break
                @endif
            @endforeach
            <td scope="row">
                <a href=" {{route('usuarios.show',['codigo' => $usuario->usu_codigo])}} " class="btn btn-info">Detalles</a>
            </td>
            <td scope="row">
                <a href=" {{route('usuarios.rol', ['codigo' => $usuario->usu_codigo])}} " class="btn btn-primary">Cambiar rol</a>
            </td>
            <td>
                <form action="{{route('usuarios.destroy', $usuario)}}" method="POST">
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
        <p>No hay usuarios registrados.</p>
    @endif
@endsection
@section ('bottom')
@endsection
