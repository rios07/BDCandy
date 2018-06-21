@extends('layouts.app')

@section('content')

    <div class="jumbotron text-center">
        <h1 class=""> Clientes Naturales </h1>
        <nav class="navbar navbar-light bg-light justify-content-between">

            <ul class="nav nav-pills">
                <li class="nav-item">  <a class="nav-link" href="/"> <b>CandyUcab</b>      </a>     </li>
                <li class="nav-item">  <a class="nav-link" href="/Clientes/ClienteN"> Clientes naturales</a>     </li>
                <li class="nav-item"> <a class="nav-link" href="/Clientes/ClienteN/create">Nuevo Cliente</a></li>  
                <li class="nav-item btn-nav-input" style="margin-left: 30%;">
                    <form align="right" class="form-inline  my-100 my-lg-0">
                        <input  class="form-control " type="search" placeholder="Buscar" aria-label="search">
                        <button class="btn btn-outline-primary" type="submit">Buscar</button>
                    </form>
                </li>  

            </ul>
       
          </nav>

    </div>

 
        <div class="row">
            <table class="table table-striped" name="ClienteJ" id="ClienteJ">

                <thead class="thead-dark">
                        <tr>
                        <th scope="col"> Rif  </th>
                        <th scope="col"> CI</th>
                        
                        <th scope="col">Nombre</th>
                        <th scope="col"> 2do Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col"> 2do Apellido </th>
                        <th scope="col">Correo Electronico</th>

                        <th scope="col">Modificar</th>
                        <th scope="col">Eliminar</th>
                        <th scope="col">Detalles</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($ClienteNatural as $cliente)
                        <tr>
                           <td>{{ $cliente->cli_nat_rif  }}</td> 
                           <td>{{ $cliente->cli_nat_ci }}</td>
                           <td>{{ $cliente->clie_nat_primer_nombre}}</td> 
                           <td>{{ $cliente->cli_nat_segund_nombre}}</td> 
                           <td>{{ $cliente->cli_nat_primer_apellido }}</td>
                           <td>{{ $cliente->cli_nat_segund_apellido }}</td>          
                           <td>{{ $cliente->cli_nat_correo_electronico}}</td> 
                           <td> 
                                <a href="{{ route('ClientesN.edit', $cliente->cli_nat_rif) }} " class="btn btn-outline-primary">Modificar</a> 
                                
                           </td>
                           <td> 
                                <form action="{{ route('ClientesNatural.destroy', $cliente->cli_nat_rif) }} " method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-outline-primary" > Eliminar  </button>
                                </form> 
                            </td>
                           <td> 
                            <a href=" {{ route('ClienteN.show',  $cliente->cli_nat_rif) }}" class="btn btn-outline-primary" >  Detalles </a>
                           </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
  
@endsection 
@section('scripts')
   
     

      

@endsection