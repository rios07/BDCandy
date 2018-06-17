@extends('layouts.app')

@section('content')

    <div class="jumbotron text-center">
<<<<<<< HEAD
        <h1 > Registro de Clientes</h1>
 
        <div class="row">
            {!! Form::open(array('route' => 'agregar', 'class' => 'form')) !!}
            
                <fieldset class="form-group">
                    <label for="rif">Rif</label>
                    <input type="text" class="form-control" id="rif" name="rif" placeholder="nro de rif">

                    <label for="denominacionFiscal">Denominación Social</label>
                    <input type="text" class="form-control" id="denominacion Fiscal" name="denominacionFiscal" placeholder="Denominacion Fiscal">
                </fieldset>
            
                 <fieldset class="form-group">
                    <label for="correo"> Correo </label>
                    <input type="text" class="form-control" id="correo" name="correo" placeholder="correo ">
                </fieldset>
                <fieldset class="form-group">
                    <label for="paginaWeb">Pagina Web</label>
                    <input type="text" class="form-control" id="paginaWeb" name="paginaWeb" placeholder="Pagina Web">
                </fieldset>

                <fieldset class="form-group">
                    <label for="capitalDisponible">Capital Disponible</label>
                    <input type="text" class="form-control" id="capitalDisponible" name="capitalDisponible" placeholder="Capital Disponible">
                </fieldset>
                <div class="form-inline my-auto my-lg-auto" style="margin-left: 250%">
                     <button type="submit" class="btn btn-outline-primary"> Registrar</button>
                </div>
               
            {{form::close()}}


        </div>
           
        </div>
    </div>
=======
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
>>>>>>> francisco
