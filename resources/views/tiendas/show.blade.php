@extends('layouts.app') 
@section('title',"Tienda: $tienda->tie_nombre")   
@section('content')
    <div class="row mt-3">
        <div class="col-8">
    	    <h1>Nombre de la tienda: {{$tienda->tie_nombre}}</h1> 
            <p>Rif: {{$tienda->tie_rif}} </p>
    	    <p>Descripción: <strong>{{$tienda->tie_descripcion}}</strong></p>
    	    <p>Tipo: <strong>{{$tienda->tie_tipo}}</strong></p>
            <p>Lugar: {{$lugar->lug_nombre}}</p>
            <a href="{{ route('tiendas.pedidos', ['codigo' => $tienda->tie_codigo]) }}" class="btn btn-info">Pedidos</a>
            <br>
            <br>
    	    <p>
    	    	<a href="{{ route('tiendas') }}">Regresar al listado de tiendas</a>
    	    </p>
        </div>
    </div>

    <!--<div class="col-lg-12" style="margin-top:2px;">

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="col-xs-9 col-sm-9 col-md-9 ">
                             <table class="table table-striped" name="producto" id="tienda">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Rif</th>
                                        <th scope="col">Nombre</th>
                                        <th scopre="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row">hola</td>
                                        <td scope="row">chao</td>
                                        <td scope="row"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <table class="table table-striped" name="producto" id="tienda">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Rif</th>
                                        <th scope="col">Nombre</th>
                                        <th scopre="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row">hola</td>
                                        <td scope="row">chao</td>
                                        <td scope="row"></td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>-->
@endsection