@extends('layouts.app')
@section('title',"Clientes Naturales")
@section('content')

    <div class="jumbotron text-center">
        <h1 class=""> Clientes Naturales </h1>
        <nav class="navbar navbar-light bg-light justify-content-between">
            <ul class="nav nav-pills">
                <li class="nav-item">  <a class="nav-link" href="{{url('/')}}"> <b>CandyUcab</b></a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('/Clientes/ClienteN/create') }}">Nuevo Cliente</a></li>  
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
            <table class="table" name="ClienteJ" id="ClienteJ">

                <thead class="thead-dark">
                        <tr>
                        <th scope="col"> Rif  </th>
                        <th scope="col"> CI</th>                        
                        <th scope="col">Nombre</th>
                        <th scope="col"> 2do Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col"> 2do Apellido </th>
                        <th scope="col">Correo Electronico</th>
                        <th scope="col">Detalles</th>
                        <th scope="col">Modificar</th>
                        <th scope="col">Eliminar</th>                        
                    </tr>
                </thead>

                <tbody>
                    @foreach($ClienteNatural as $cliente)
                        <tr>
                           <td>{{ $cliente->cli_nat_rif  }}</td> 
                           <td>{{ $cliente->cli_nat_ci }}</td>
                           <td>{{ $cliente->clie_nat_primer_nombre}}</td> 
                           <td>{{ $cliente->cli_nat_segundo_nombre}}</td> 

                           <td>{{ $cliente->cli_nat_primer_apellido }}</td>
                           <td>{{ $cliente->cli_nat_segundo_apellido }}</td>          
                           <td>{{ $cliente->cli_nat_correo_electronico}}</td>

                           <td> 
                                <a href=" {{ route('ClienteN.show',  $cliente->cli_nat_rif) }}" class="btn btn-info" >  Detalles </a>
                           </td>
                           <td> 
                                <a href="{{ route('ClientesN.edit', $cliente->cli_nat_rif) }} " class="btn btn-primary">Modificar</a>                                 
                           </td>
                           <td> 
                              <form action="{{ route('ClientesNatural.destroy', $cliente->cli_nat_rif) }} " method="post">
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