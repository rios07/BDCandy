@extends('layouts.app')

@section('title', "Modificar producto")

@section('content')
    <div class="card">
        <h4 class="card-header">Modificar producto</h4>
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

            <form method="POST" action="{{ route('productos.update', $producto) }}">
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" name="pro_nombre" id="nombre" placeholder="Nombre del producto" value="{{ old('pro_nombre',$producto->pro_nombre) }}">
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <input type="text" class="form-control" name="pro_descripcion" id="descripcion" placeholder="Descripción" value="{{ old('pro_descripcion',$producto->pro_descripcion) }}">
                </div>

                <div class="form-group">
                    <label for="sabor">Sabor:</label>
                    <input type="text" class="form-control" name="pro_sabor" id="sabor" placeholder="Sabor" value="{{ old('pro_sabor',$producto->pro_sabor) }}">
                </div>

                <div class="form-group">
                    <label for="color">Color:</label>
                    <input type="text" class="form-control" name="pro_color" id="color" placeholder="Color" value="{{ old('pro_color',$producto->pro_color) }}">
                </div>

                <div class="form-group">
                    <label for="relleno">Relleno:</label>
                    <input type="text" class="form-control" name="pro_relleno" id="relleno" placeholder="Relleno (Opcional)" value="{{ old('pro_relleno',$producto->pro_relleno) }}">
                </div>

                <div class="form-group">
                    <label for="tipo">Tipo de producto:</label>
                    @if ($tipo_productos->isNotEmpty())
                        <select class="form-control form-control-lg" name="pro_tipo_producto" id="tipo">
                            @foreach($tipo_productos as $tipo_producto)
                            @if ($tipo_producto->tip_pro_codigo == $producto->fk_tipo_producto)
                                <option selected value="{{ $tipo_producto->tip_pro_codigo }}">{{ $tipo_producto->tip_pro_nombre }}</option>
                            @else
                                <option value="{{ $tipo_producto->tip_pro_codigo }}">{{ $tipo_producto->tip_pro_nombre }}</option>
                            @endif
                            @endforeach
                        </select>
                    @else
                        <select>
                            <option>No hay tipos de productos.</option>
                        </select>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Actualizar producto</button>                
            </form>
            <a href="{{ route('productos') }}" class="btn btn-link">Regresar al listado de productos</a>
        </div>
    </div>
@endsection