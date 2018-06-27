@extends('layouts.app')

@section('title', "Modificar oferta")

@section('content')
    <div class="card">
        <h4 class="card-header">Modificar oferta</h4>
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

            <form method="POST" action="{{ route('ofertas.update', $ofertapro) }}">
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="producto">Producto</label>
                    @if (!empty($productos))
                        <select class="form-control form-control-lg" name="fk_producto" id="producto">
                            @foreach($productos as $producto)
                            @if (($producto->pro_codigo) == ($ofertapro->fk_producto))
                                <option selected value="{{ $producto->pro_codigo }}">{{ $producto->pro_nombre }}</option>
                            @else
                                <option value="{{ $producto->pro_codigo }}">{{ $producto->pro_nombre }}</option>
                            @endif
                            @endforeach
                        </select>
                    @else
                        <select class="form-control form-control-lg">
                            <option>No hay productos registrados.</option>
                        </select>
                    @endif
                </div>

                <div class="form-group">
                    <label for="valor">Valor</label>
                    <input type="number" class="form-control" name="ofe_pro_valor" id="valor" placeholder="Debe ser unico" value="{{ old('ofe_pro_valor',$ofertapro->ofe_pro_valor) }}">
                </div>

                <div class="form-group">
                    <label for="fecha_inicio">Fecha de inicio</label>
                    <input type="date" class="form-control" name="ofe_fecha_inicio" id="fecha_inicial" placeholder="Nombre" value="{{ old('ofe_fecha_inicio',$oferta->ofe_fecha_inicio) }}">
                </div>

                <div class="form-group">
                    <label for="fecha_final">Fecha de expiración</label>
                    <input type="date" class="form-control" name="ofe_fecha_final" id="fecha_final" placeholder="Descripcion" value="{{ old('ofe_fecha_final',$oferta->ofe_fecha_final) }}">
                </div>

                <button type="submit" class="btn btn-primary">Modificar oferta</button>                
            </form>
            <a href="{{ route('ofertas') }}" class="btn btn-link">Regresar al listado de ofertas</a>
        </div>
    </div>
@endsection