@extends('layouts.app')

@section('title', "Modificar rol")

@section('content')
    <div class="card">
        <h4 class="card-header">Modificar rol</h4>
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

            <form method="POST" action="{{ route('roles.update', $rol)}}">
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="nombre">Nombre del rol:</label>
                    <input type="text" class="form-control" name="name" id="nombre" placeholder="Nombre del producto" value="{{ old('name',$rol->name) }}">
                </div>

                <p><strong>Privilegios: </strong></p>
                <h4 class="card-header">Privilegios</h4>
                <div class="form-checkbox card-body">
                @if($privilegios->isNotEmpty())
                    @foreach ($privilegios as $privilegio)                
                        <label class="form-check-label center-block">
                            <input style="height: 20px; width: 20px;" class="form-check-input" type="checkbox" name="privilegio[]" value="{{ $privilegio->name }}" @if($rol->hasPermissionTo($privilegio->name)) checked @endif>
                            {{$privilegio->name}}
                        </label>                
                    @endforeach
                    @else
                    <p>No tiene privilegios</p>
                @endif
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Actualizar rol</button>                
            </form>
            <a href="{{ route('roles') }}" class="btn btn-link">Regresar al listado de roles</a>
        </div>
    </div>
@endsection