@extends('layouts.app')
@section('title','Puntos')
@section('content')

    <div class="jumbotron text-center" style="background-image: url('http://localhost/BDCandy/public/image/fondo2.jpg'); background-repeat: repeat-x; background-position: center; background-size: 40%;">
        <h1 class=""> Cliente Juridico </h1>
        <nav class="navbar navbar-light bg-light justify-content-between">

            <ul class="nav nav-pills">
                <li class="nav-item"> <a class="nav-link" href="{{ url('/') }}"><b>CandyUcab</b></a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('/Puntos/create') }}">Nuevo Punto</a></li>  
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
          </nav>
    </div>

 
        <div class="row">
         
            <table class="table table-striped" name="ClienteJ" id="ClienteJ">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Valor del Punto (BSF)</th>
                        <th scope="col">Fecha Inicio</th>
                        <th scope="col">Fecha Fin</th>
                        <th scope="col">Modificar</th>
                        <th scope="col">Eliminar</th>
 
                    </tr>
                </thead>

                <tbody>
                    @foreach($punto as $puntos)
                        <tr>
                           <td>{{ $puntos->pun_valor  }}</td> 
                           <td>{{ $puntos->pun_fecha_inicio }}</td> 
                           <td>{{ $puntos->pun_fecha_fin }}</td>
                           <td> 
                                <a href="{{ route('punto.edit', $puntos->pun_codigo) }} " class="btn btn-primary">Modificar</a> 
                                
                           </td>
                           <td> 

                                <form action="{{ route('punto.destroy', $puntos->pun_codigo) }} " method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-danger" > Eliminar  </button>
                                </form> 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> 
@endsection
@section('scripts')
@endsection