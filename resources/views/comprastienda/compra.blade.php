@extends('layouts.app')
@section('title', 'Comprar en tienda')
@section('content')

    <div class="jumbotron text-center" style="background-image: url('http://localhost/BDCandy/public/image/fondo2.jpg'); background-repeat: repeat-x; background-position: center; background-size: 40%;">
        <h1 class=""> Compra en tienda </h1>
        <nav class="navbar navbar-light bg-light justify-content-between">
            <ul class="nav nav-pills">
                <li class="nav-item">  <a class="nav-link" href=" {{ url()->previous() }} "> <b>Regresar a las facturas de la tienda</b>   </a>     </li>
                @guest            
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{Auth::user()->usu_nombre }}<span class="caret"></span>
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

<div class="container">
    <div class="row">
        <div class="col-md-12">               
            <compra2></compra2>
        </div>
    </div>
</div>
@endsection

@section('bottom')
    <script src="{{ asset('components/compra2.tag') }}" type="riot/tag"></script>
    <script>
        $(document).ready(function(){
            riot.mount('compra2');
        })
    </script>
@endsection