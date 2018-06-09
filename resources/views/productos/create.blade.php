@extends('layouts.app')

@section('title', "Crear producto")

@section('content')
    <div class="card">
        <h4 class="card-header">Crear producto</h4>
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

            <form method="POST" action="{{ url('productos') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del producto" value="{{ old('nombre') }}">
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripción" value="{{ old('descripcion') }}">
                </div>

                <div class="form-group">
                    <label for="sabor">Sabor:</label>
                    <input type="text" class="form-control" name="sabor" id="sabor" placeholder="Sabor" value="{{ old('sabor') }}">
                </div>

                <div class="form-group">
                    <label for="color">Color:</label>
                    <input type="text" class="form-control" name="color" id="color" placeholder="Color" value="{{ old('color') }}">
                </div>

                <div class="form-group">
                    <label for="Relleno">Relleno:</label>
                    <input type="text" class="form-control" name="relleno" id="relleno" placeholder="Relleno (Opcional)">
                </div>

                <div class="form-group">
                    <label for="fabrica">Fabrica:</label>
                    <input type="number" class="form-control" name="fabrica" id="fabrica" placeholder="Numero de fabrica" value="1">
                </div>

                <div class="form-group">
                    <label for="tipo">Tipo de producto:</label>
                    <input type="number" class="form-control" name="tipo" id="tipo" placeholder="Numero del tipo de producto" value="1">
                </div>

                <button type="submit" class="btn btn-primary">Crear producto</button>
                <a href="{{ route('productos') }}" class="btn btn-link">Regresar al listado de productos</a>
            </form>
        </div>
    </div>
@endsection