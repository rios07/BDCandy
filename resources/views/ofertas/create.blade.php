@extends('layouts.app')

@section('title', "Crear oferta")

@section('content')
    <div class="card">
        <h4 class="card-header">Crear oferta</h4>
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

            <form method="POST" action="{{ url('ofertas') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="producto">Producto</label>
                    @if ($productos->isNotEmpty())
                        <select class="form-control form-control-lg" name="producto" id="producto">
                                <option value="" selected disabled hidden>Productos elegibles</option>
                            @foreach($productos as $producto)
                                <option value="{{$producto->pro_codigo}}">{{$producto->pro_nombre}}</option>
                            @endforeach
                        </select>
                    @else
                        <select>
                            <option>No hay productos disponibles.</option>
                        </select>
                    @endif
                </div>

                <div class="form-group">
                    <label for="valor">Valor</label>
                    <input type="number" class="form-control" name="valor" id="valor" placeholder="Valor de la oferta" value="{{ old('valor') }}" min="1">
                </div>

                <div class="form-group">
                    <label for="descripcion">Fecha de inicio</label>
                    <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha de inicio" value="{{ old('fecha_inicio') }}">
                </div>

                <div class="form-group">
                    <label for="fecha_final">Fecha de expiración</label>
                    <input type="date" class="form-control" name="fecha_final" id="fecha_final" placeholder="Fecha de expiración" value="{{ old('fecha_final') }}">
                </div>

                <button type="submit" class="btn btn-primary">Crear oferta</button>                
            </form>
            <a href="{{ route('ofertas') }}" class="btn btn-link">Regresar al listado de ofertas</a>
        </div>
    </div>
@endsection