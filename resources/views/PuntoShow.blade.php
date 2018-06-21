@extends('layouts.app')

@section('content')

    <div class="jumbotron text-center">
        <h1 class=""> Cliente Juridico </h1>
        <nav class="navbar navbar-light bg-light justify-content-between">

            <ul class="nav nav-pills">
                <li class="nav-item">  <a class="nav-link" href="{{ url('/') }}"> <b>CandyUcab</b>      </a>     </li>
                <li class="nav-item">  <a class="nav-link" href="{{ url('/Punto') }}"> Puntos</a>     </li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('/Puntos/create') }}">Nuevo Punto</a></li>  
                <li class="nav-item btn-nav-input" style="margin-left: 10%;">
                    <form align="right" class="form-inline  my-100 my-lg-0">
                        <input  class="form-control " type="search" placeholder="Buscar" aria-label="search">
                        <button class="btn btn-outline-primary" type="submit">Buscar</button>
                    </form>
                </li>  
                

            </ul>
          </nav>
    </div>

 
        <div class="row">
         
            <table class="table" name="ClienteJ" id="ClienteJ">
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
                                <a href="{{ route('punto.edit', $puntos->pun_codigo) }} " class="btn btn-outline-primary">Modificar</a> 
                                
                           </td>
                           <td> 

                                <form action="{{ route('punto.destroy', $puntos->pun_codigo) }} " method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-outline-primary" > Eliminar  </button>
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