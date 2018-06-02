@extends('layouts.app')

@section('content')

    <div class="jumbotron text-center">
        <h1 class="display-1"> CandyUcab </h1>
 
        <div class="row">
            <form method="POST" action="{{ url('/Clientes/ClientesJuridicos') }}">
                {{ csrf_field() }}
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="name" placeholder="Pedro Perez" value="{{ old('name') }}">
                @if ($errors->has('name'))
                    <p>{{ $errors->first('name') }}</p>
                @endif
                <br>
                <label for="email">Correo electrónico:</label>
                <input type="email" name="email" id="email" placeholder="pedro@example.com" value="{{ old('email') }}">
                <br>
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" placeholder="Mayor a 6 caracteres">
                <br>
                <button type="submit">Crear Cliente</button>
            </form>
        </div>
    </div>
</div>
@endsection