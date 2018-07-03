@extends('layouts.app')
@section('title', 'Factura de compra')
@section('content')

    <div class="jumbotron text-center" style="background-image: url('http://localhost/BDCandy/public/image/fondo2.jpg'); background-repeat: repeat-x; background-position: center; background-size: 40%;">
        <h1 class=""> {{$title}} </h1>
        <nav class="navbar navbar-light bg-light justify-content-between">

            <ul class="nav nav-pills">
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

    @if ($facturas->isNotEmpty())
    <table class="table table-striped" name="producto" id="factura">
        <thead class="thead-dark">
        <tr>
            <th scope="col" class="col-sm-5">Número de factura</th>
            <th scope="col" class="col-sm-2">Monto total</th>
            <th scope="col" class="col-sm-3" >Fecha de facturación</th>
            <th scope="col"> </th>
        </tr>
        </thead>
        <tbody>
        @foreach($facturas as $factura)
        <tr>
            <td scope="row">{{ $factura->com_web_codigo }}</td>
            <td scope="row">$ {{ $factura->com_web_monto }}</td>
            <td scope="row">{{ $factura->com_fecha }}</td>
            <td >
                <a href=" {{ route('facturas.pagos', ['codigo' => $factura->com_web_codigo]) }} " class="btn btn-primary">Detalles de pago</a>
            </td>            
            <td >
                <a href=" {{ route('facturas.show', ['codigo' => $factura->com_web_codigo]) }} " class="btn btn-info">Detalles de productos</a>
            </td>            
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <p>No hay facturas registradas.</p>
    @endif
@endsection
@section ('bottom')
@endsection