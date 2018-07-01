@extends('layouts.app')
@section('title', 'Detalle de factura')
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

    @if ($detalles->isNotEmpty())
    <table class="table table-striped" name="producto" id="detalle">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Producto</th>
            <th style="width:100px;" class="text-right">Cantidad</th>
            <th style="width:100px;" class="text-right">Precio Unitario</th>
            <th style="width:100px;" class="text-right">Total</th>
        </tr>
        </thead>
        <tbody>
        @foreach($detalles as $detalle)
        <tr>
            @foreach($productos as $producto)
                @if ($producto->pro_codigo == $detalle->fk_producto)           
                    <td scope="row">{{$producto->pro_nombre}} </td>
                @break
                @endif
            @endforeach             
            <td scope="row" class="text-right">{{ $detalle->pro_com_cantidad }}</td>
            <td scope="row" class="text-right">{{ $detalle->pro_com_precio_producto}}</td>
            <td scope="row" class="text-right">$ {{ $detalle->pro_com_cantidad*$detalle->pro_com_precio_producto }}</td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="text-right"><b>Total</b></td>
                <td class="text-right">$ {{$total->com_web_monto}} </td>
            </tfoot>
    </table>
    @else
        <p>No hay detalles registrados.</p>
    @endif
@endsection
@section ('bottom')
@endsection