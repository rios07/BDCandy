@extends('layouts.app')

@section('title', "Nuevo rol")

@section('content')
    <div class="card">
        <h4 class="card-header">Nuevo rol</h4>
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

            <form method="POST" action="{{ url('/roles')}}">
                {{ csrf_field() }}
                <br>
                <div class="form-group">
                    <label for="nombre">Nombre del rol:</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre del rol" value="{{ old('rol') }}">
                </div>
                <h4 class="card-header">Privilegios</h4>
                <div class="form-checkbox card-body">
                @foreach ($privilegios as $privilegio)                
                    <label class="form-check-label center-block">
                        <input style="height: 20px; width: 20px;" class="form-check-input" type="checkbox" name="privilegio[]" value="{{ $privilegio->name }}">
                        {{$privilegio->name}}
                    </label>                
                @endforeach
                </div>
                <br>
                <button type="submit" class="btn btn-primary center-block">Crear rol</button>                
            </form>
            <a href="{{ route('roles') }}" class="btn btn-link">Regresar al listado de roles</a>
        </div>
    </div>
@endsection