@extends('layouts.app')

@section('title', "Crear tienda")

@section('content')
    <div class="card">
        <h4 class="card-header">Crear tienda</h4>
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
                    <label for="rif">Número de rif</label>
                    <input type="text" class="form-control" name="rif" id="rif" placeholder="Debe ser unico" value="{{ old('rif') }}">
                </div>

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="{{ old('nombre') }}">
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion" value="{{ old('descripcion') }}">
                </div>

                <div id="tipo" class="form-group">
                    <label for="tipo">Tipo de tienda</label>
                    @if (!empty($tipo_tiendas))
                        <select class="form-control form-control-lg" name="tipo" id="tipo2">
                                <option value="" selected disabled hidden>Elige el tipo de tienda</option>
                            @foreach($tipo_tiendas as $key => $value)
                                <option value="{{$value}}">{{$value}}</option>
                            @endforeach
                        </select>
                    @else
                        <select>
                            <option>No hay tipos de tiendas.</option>
                        </select>
                    @endif
                </div>

                <div class="form-group">
                    <label for="lugar">Lugar</label>
                    @if ($lugares->isNotEmpty())
                        <select class="form-control form-control-lg" name="lugar" id="lugar">
                                <option value="" selected disabled hidden>Parroquias</option>
                            @foreach($lugares as $lugar)
                                <option value="{{$lugar->lug_codigo}}">{{$lugar->lug_nombre}}</option>
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
@section('scripts')
@endsection