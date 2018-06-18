@extends('layouts.app')

@section('content')

    <div class="jumbotron text-center">
        <h1 class=""> Cliente Juridico </h1>
        <nav class="navbar navbar-light bg-light justify-content-between">

            <ul class="nav nav-pills">
                <li class="nav-item">  <a class="nav-link" href="{{ url('/') }}"> <b>CandyUcab</b>      </a>     </li>
                <li class="nav-item">  <a class="nav-link" href="{{ url('/Clientes/ClienteJ') }}"> Clientes Juridico</a>     </li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('/Clientes/ClienteJ/create') }}">Nuevo Cliente</a></li>  
                <li class="nav-item btn-nav-input" style="margin-left: 10%;">
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

 
        <div class="row">
         
            <table class="table" name="ClienteJ" id="ClienteJ">
                <thead class="thead-dark">
                        <tr>
                        <th scope="col">  rif  </th>
                        <th scope="col">Denominacion Fiscal</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Pagina Web</th>
                        <th scope="col">Capital Disponible</th>
                        <th scope="col">Modificar</th>
                        <th scope="col">Eliminar</th>
                        <th scope="col">Detalles</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach($ClientesJuridicos as $cliente)
                        <tr>
                           <td>{{ $cliente->rif  }}</td> 
                           <td>{{ $cliente->denominacionFiscal}}</td> 
                           <td>{{ $cliente->correo }}</td>          
                           <td>{{ $cliente->paginaWeb}}</td> 
                           <td>{{ $cliente->capitalDisponible }}</td> 
                           <td> 
                          <!--      <a href=" " class="btn btn-outline-primary">Modificar</a> -->
                                
                           </td>
                           <td> 
                                <form action="{{ route('ClientesJuridicos.destroy', ['ClientesJuridicos' => $cliente->rif]) }} " method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-outline-primary" > Eliminar  </button>
                                </form> 
                            </td>
                           <td> 
                            <button type="button" class="btn btn-outline-primary" >  Detalles </button>

                           </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> 
@endsection
@section('scripts')
@endsection