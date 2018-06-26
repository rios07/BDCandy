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
          </nav>
    </div>

 
        <div class="row">
         
            <table class="table" name="ClienteJ" id="ClienteJ">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col"> Rif  </th>
                        <th scope="col">Denominacion Fiscal</th>
                        <th scope="col">Razon Social</th>
                        <th scope="col">Correo Electronico</th>
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
                           <td>{{ $cliente->cli_jur_rif  }}</td> 
                           <td>{{ $cliente->cli_jur_denominacion_fiscal }}</td> 
                           <td>{{ $cliente->cli_jur_razon_social }}</td>
                           <td>{{ $cliente->cli_jur_correo_electronico }}</td>          
                           <td>{{ $cliente->cli_jur_pagina_web}}</td> 
                           <td>{{ $cliente->cli_jur_capital_disponible }}</td> 
                           <td> 
                                <a href="{{ route('ClientesJ.edit', $cliente->cli_jur_rif) }} " class="btn btn-outline-primary">Modificar</a> 
                                
                           </td>
                           <td> 

                                <form action="{{ route('ClientesJuridicos.destroy', $cliente->cli_jur_rif) }} " method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-outline-primary" > Eliminar  </button>
                                </form> 
                            </td>
                           <td> 
                            <a href=" {{ route('ClienteJ.show',  $cliente->cli_jur_rif) }}" class="btn btn-outline-primary" >  Detalles </a>

                           </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> 
@endsection
@section('scripts')
@endsection