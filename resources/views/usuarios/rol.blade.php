@extends('layouts.app')

@section('title', "Cambiar rol")

@section('content')
    <div class="card">
        <h4 class="card-header">Cambiar rol del usuario: {{$usuario->usu_nombre}}</h4>
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

            <form method="POST" action="{{ route('usuarios.update', $usuario) }}">
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="tipo">Roles:</label>
                    @if ($roles->isNotEmpty())
                        <select class="form-control form-control-lg" name="fk_rol" id="tipo">
                            @foreach($roles as $rol)
                            @if ($rol->id == $usuario->fk_rol)
                                <option selected value="{{ $rol->name }}">{{ $rol->name }}</option>
                            @else
                                <option value="{{ $rol->name }}">{{ $rol->name }}</option>
                            @endif
                            @endforeach
                        </select>
                    @else
                        <select>
                            <option>No hay roles .</option>
                        </select>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Asignar rol</button>                
            </form>
            <a href="{{ route('usuarios') }}" class="btn btn-link">Regresar al listado de usuarios</a>
        </div>
    </div>
@endsection