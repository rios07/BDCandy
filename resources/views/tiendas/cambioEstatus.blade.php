@extends('layouts.app')

@section('title', "Modificar estatus")

@section('content')
    <div class="card">
        <h4 class="card-header">Modificar estatus</h4>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <h6>Por favor corrige los errores debajo:</h6>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('tiendas.cambio', ['codigo' => $pedido->ped_tie_codigo]) }}">
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="rif">Numero de pedido:</label>
                    <input type="text" class="form-control" name="tie_rif" id="rif" placeholder="Debe ser unico" value="{{ old('tie_rif',$pedido->ped_tie_codigo) }}" readonly>
                </div>

                <div class="form-group">
                    <label for="nombre">Nombre del producto:</label>
                    <input type="text" class="form-control" name="pro_nombre" id="nombre" placeholder="Nombre del producto" value="{{ old('pro_nombre',$pedido->pro_nombre) }}" readonly>
                </div>

                <div class="form-group">
                    <label for="descripcion">Fecha de Emision:</label>
                    <input type="date" class="form-control" name="ped_tie_fecha_emision" id="descripcion" placeholder="Descripcion" value="{{ old('ped_tie_fecha_emision',$pedido->ped_tie_fecha_emision) }}" readonly>
                </div>

                <div class="form-group">
                    <label for="tipo">Estatus:</label>
                        <select class="form-control form-control-lg" name="fk_estatus" id="tipo">
                            @foreach($estatus as $estatu)
                            @if (($estatu->est_codigo) == $pedido->fk_estatus)
                                <option selected value="{{ $estatu->est_codigo }}">{{ $estatu->est_tipo }}</option>
                            @else
                                <option value="{{ $estatu->est_codigo }}">{{ $estatu->est_tipo }}</option>
                            @endif
                            @endforeach
                        </select>
                </div>

                <button type="submit" class="btn btn-primary">Modificar pedido</button>                
            </form>
            <a href="{{ route('tiendas.pedidos',['codigo' => $pedido->fk_tienda]) }}" class="btn btn-link">Regresar al listado de pedidos</a>
        </div>
    </div>
@endsection