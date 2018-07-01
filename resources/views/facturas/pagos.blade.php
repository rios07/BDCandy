@extends('layouts.app')
@section('title', 'Detalles de pago')
@section('content')

    <div class="jumbotron text-center" style="background-image: url('http://localhost/BDCandy/public/image/fondo2.jpg'); background-repeat: repeat-x; background-position: center; background-size: 40%;">
        <h1 class=""> {{$title}} </h1>
        <nav class="navbar navbar-light bg-light justify-content-between">

            <ul class="nav nav-pills">
                <li class="nav-item">  <a class="nav-link" href=" {{ url()->previous() }} "> <b>Regresar a la lista de facturas</b>   </a>     </li>
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
                                @csrfs
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
    </div>

    @if ($pagos->isNotEmpty())
    <table class="table table-striped" name="producto" id="detalle">
        <thead class="thead-dark">
        <tr>
            <th scope="col" class="col-sm-4">Tarjeta de credito</th>
            <th scope="col" class="col-sm-2">Banco</th>
            <th scope="col" class="col-sm-2">Tipo</th>
            <th style="width:100px;">Fecha del pago</th>
            <th style="width:100px;" class="text-right">Monto</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pagos as $pago)
        <tr>        
            <td scope="row">{{$pago->med_pag_tar_cred_numero}} </td>            
            <td scope="row" >{{ $pago->med_pag_tar_cred_banco }}</td>
            <td scope="row" >{{ $pago->med_pag_tar_cred_tipo}}</td>
            <td scope="row" >{{ $pago->pag_fecha }}</td>
            <td scope="row" class="text-right">$ {{ $pago->pag_monto }}</td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" class="text-right"><b>Total</b></td>
                <td class="text-right">$ {{$total->com_web_monto}} </td>
            </tfoot>
    </table>
    @else
        <p>No hay detalles registrados.</p>
    @endif
@endsection
@section ('bottom')
@endsection