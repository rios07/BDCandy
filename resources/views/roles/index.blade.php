@extends('layouts.app')
@section('title', 'Roles')
@section('content')

    <div class="jumbotron text-center" style="background-image: url('http://localhost/BDCandy/public/image/fondo2.jpg'); background-repeat: repeat-x; background-position: center; background-size: 40%;">
        <h1 class=""> {{$title}} </h1>
        <nav class="navbar navbar-light bg-light justify-content-between">

            <ul class="nav nav-pills">
                <li class="nav-item">  <a class="nav-link" href=" {{ url('usuarios') }} "> <b>Usuarios</b>   </a>     </li>
                <li class="nav-item">  <a class="nav-link" href=" {{ route('roles.create')}} "> <b>Nuevo rol</b>   </a>     </li>
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

    @if ($roles->isNotEmpty())
    <table class="table table-striped" name="producto" id="producto">
        <thead class="thead-dark">
        <tr>
            <th scope="col" class="col-sm-3 text-center">Codigo de rol</th>
            <th scope="col" class="col-sm-5 text-center">Nombre del rol</th>
            <th scopre="col" class="text-center">Detalles</th>   
            <th scopre="col" class="text-center">Modificar</th>   
            <th scopre="col" class="text-center">Eliminar</th>   
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $rol)
        <tr>
            <td scope="row" class="text-center">{{ $rol->id }}</td>
            <td scope="row" class="text-center">{{ $rol->name }}</td>
            <td>
                <a href=" {{ route('roles.show', ['codigo' => $rol->id]) }} " class="btn btn-info ">Detalles</a>
            </td>
            <td>
                <a href=" {{ route('roles.edit', ['codigo' => $rol->id]) }} " class="btn btn-primary text-center">Modificar</a>
            </td>
            <td>
                <form action="{{ route('roles.destroy', ['codigo' => $rol->id] ) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}               
                    <button type="submit" class="btn btn-danger center-block">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <p>No hay roles registrados.</p>
    @endif
@endsection
@section ('bottom')
@endsection
