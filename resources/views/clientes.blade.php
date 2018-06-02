@extends('layouts.app')

@section('content')

    <div class="jumbotron text-center">
        <h2 class="display-2"> <b>Nuestros Clientes</b>   </h2>
        <div class="row">
            @foreach ($clientes as $cliente)
            <div class="col-6">
                <img class="img-thumbnail" src="
                   {{ asset( $cliente['imagen'] ) }}  ">
                <p class="card-text"> <b>
                    {{ $cliente['contenido'] }}
                <a href='{{asset($cliente["direccion"])}}'>Ingresar</a>   
                 </b>
                </p>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection