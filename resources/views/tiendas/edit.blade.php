@extends('layouts.app')

@section('title', "Modificar tienda")

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

            <form method="POST" action="{{ url('tiendas') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="rif">Número de rif:</label>descripcion
                    <input type="text" class="form-control" name="tie_rif" id="rif" placeholder="Debe ser unico" value="{{ old('tie_rif',$tienda->tie_rif) }}">
                </div>

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" name="tie_nombre" id="nombre" placeholder="Nombre" value="{{ old('tie_nombre',$tienda->tie_nombre) }}">
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripcion:</label>
                    <input type="text" class="form-control" name="tie_descripcion" id="descripcion" placeholder="Descripcion" value="{{ old('tie_descripcion',$tienda->tie_descripcion) }}">
                </div>

                <div class="form-group">
                    <label for="tipo">Tipo de tienda:</label>
                    @if (!empty($tipo_tiendas))
                        <select class="form-control" name="tie_tipo" id="tipo">
                            @foreach($tipo_tiendas as $key => $value)
                            @if (($tienda->tie_tipo) == $value)
                                <option selected value="{{ $value }}">{{ $value }}</option>
                            @else
                                <option value="{{ $value }}">{{ $value }}</option>
                            @endif
                            @endforeach
                        </select>
                    @else
                        <select>
                            <option>No hay tipos de tiendas.</option>
                        </select>
                    @endif
                </div>

                <div class="form-group">
                    <label for="lugar">Lugar:</label>
                    @if ($lugares->isNotEmpty())
                        <select class="form-control" name="tie_lugar" id="lugar">
                            @foreach($lugares as $lugar)
                            @if ($lugar->lug_codigo == $tienda->tie_lug)
                                <option selected value="{{$lugar->lug_codigo}}">{{$lugar->lug_nombre}}</option>
                            @else
                                <option value="{{$lugar->lug_codigo}}">{{$lugar->lug_nombre}}</option>
                            @endif
                            @endforeach
                        </select>
                    @else
                        <select>
                            <option>No hay tipos de tiendas.</option>
                        </select>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Crear tienda</button>                
            </form>
            <a href="{{ route('tiendas') }}" class="btn btn-link">Regresar al listado de tiendas</a>
        </div>
    </div>
@endsection