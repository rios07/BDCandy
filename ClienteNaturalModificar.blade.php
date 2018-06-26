@extends('layouts.app')

@section('content')

    <div class="jumbotron text-center">
        <h1 > Alctualizacion de Registro</h1>
 
    </div>
                   
            {!! Form::open(array('route' => array('modificar',$ClienteNatural->cli_nat_rif))) !!}
                {{ csrf_field() }}
               
                     <div class="form-group row">
                        <div class="col-md-4">
                            <label for="rif">Rif</label>
                            <input type="text" class="form-control" id="cli_nat_rif" name="cli_nat_rif" placeholder="numero de rif" value="{{ old('cli_nat_rif',$ClienteNatural->cli_nat_rif) }}">
                        </div>
                       
                        <div class="col-md-4">
                            <label for="cli_nat_ci">Cedula de identidad</label>
                            <input type="text" class="form-control" id="cli_nat_ci" name="cli_nat_ci" placeholder="numero de cedula" value="{{ old('cli_nat_ci',$ClienteNatural->cli_nat_ci) }}">
                        </div>

                    </div>             
                               
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="cli_nat_primer_nombre"> Nombre </label>
                            <input type="text" class="form-control" id="clie_nat_primer_nombre" name="clie_nat_primer_nombre" placeholder="Nombre" value="{{ old('clie_nat_primer_nombre',$ClienteNatural->clie_nat_primer_nombre) }}">
                        </div>
                        <div class="col-md-4">
                            <label for="cli_nat_segundo_nombre">Segundoo Nombre</label>
                            <input type="text" class="form-control" id="cli_nat_segundo_nombre" name="cli_nat_segundo_nombre" placeholder="segundo nombre" value="{{ old('cli_nat_segundo_nombre',$ClienteNatural->cli_nat_segundo_nombre) }}">
                        </div>   
                        

                    </div>             
                       
                    <div class="form-group row">

                        <div class="col-md-4">
                            <label for="cli_nat_primer_nombre"> Apellido</label>
                            <input type="text" class="form-control" id="cli_nat_primer_apellido" name="cli_nat_primer_apellido" placeholder="Apellido" value="{{ old('cli_nat_primer_apellido',$ClienteNatural->cli_nat_primer_apellido) }}">
                        </div>

                         <div class="col-md-4">
                            <label for="cli_nat_primer_nombre"> Segundoo Apellido</label>
                            <input type="text" class="form-control" id="cli_nat_segundo_apellido" name="cli_nat_segundo_apellido" placeholder=" Segundo Apellido" value="{{ old('cli_nat_segundo_apellido',$ClienteNatural->cli_nat_segundo_apellido) }}">
                        </div>
                    </div>
                    <div class="form-group row">       
                            <div class="col-md-4">
                                <label for="correo"> Correo electronico</label>
                                <input type="text" class="form-control" id="cli_nat_correo_electronico" name="cli_nat_correo_electronico" placeholder="correo electronico " value="{{ old('cli_nat_correo_electronico',$ClienteNatural->cli_nat_correo_electronico) }}">
                            </div>
                   

                                            
                        <div class="col-md-6">
                            <label for="lugar">direccion</label>
                            <select class="form-control" name="fk_lugar" id="fk_lugar">
                                <option value="" selected disabled hidden>Seleccione</option>
                                @foreach($lugares as $lugarA)
                                    <option value="{{$lugarA->lug_codigo}}">{{$lugarA->lug_nombre}}</option>
                                @endforeach
                            </select>
                        </div>  

                    </div>
             
                <div class="form-inline my-auto my-lg-auto" style="margin-left: 45%">
                    <button type="submit" class="btn btn-outline-primary"> Actualizar</button>
                </div>

               
            {!!Form::close() !!}    
            
@endsection