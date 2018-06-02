@extends('layouts.app')

@section('content')

    <div class="jumbotron text-center">
        <h1 class=""> Cliente Juridico </h1>
        <nav class="navbar navbar-light bg-light justify-content-between">

            <ul class="nav nav-pills">
                <li class="nav-item">  <a class="nav-link" href="/"> <b>CandyUcab</b>      </a>     </li>
                <li class="nav-item">  <a class="nav-link" href="/Clientes/ClientesJuridicos"> Clientes Juridicos</a>     </li>
                <li class="nav-item"> <a class="nav-link" href="/Clientes/ClientesJuridicos/CrearClienteJuridico">Nuevo Cliente</a></li>  
                <li class="nav-item btn-nav-input" style="margin-left: 30%;">
                    <form align="right" class="form-inline  my-100 my-lg-0">
                        <input  class="form-control " type="search" placeholder="Buscar" aria-label="search">
                        <button class="btn btn-outline-primary" type="submit">Buscar</button>
                    </form>
                </li>  

            </ul>
       


    </div>

 
        <div class="row">
         
            <table class="table">
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
                           <td> <button type="button" class="btn btn-outline-primary" >Modificar</button></td>
                           <td> <button type="button" class="btn btn-outline-primary">Eliminar </button></td>
                           <td> <button type="button" class="btn btn-outline-primary">Detalles </button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
  
@endsection 