@extends('layouts.app')

@section('content')

    <div class="jumbotron text-center" style="background-image: url('http://localhost/BDCandy/public/image/fondo2.jpg'); background-repeat: repeat-x; background-position: center; background-size: 40%;">
        <h1 > Registro de Clientes</h1>
 
    </div>
        
            {!! Form::open(array('route' => 'agregarN')) !!}
                
               
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="rif">Rif</label>
                            <input type="text" class="form-control" id="cli_nat_rif" name="cli_nat_rif" placeholder="numero de rif">
                        </div>
                       
                        <div class="col-md-4">
                            <label for="cli_nat_ci">Cedula de identidad</label>
                            <input type="text" class="form-control" id="cli_nat_ci" name="cli_nat_ci" placeholder="numero de cedula">
                        </div>

                    </div>             
                               
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="clie_nat_primer_nombre"> Nombre </label>
                            <input type="text" class="form-control" id="clie_nat_primer_nombre" name="clie_nat_primer_nombre" placeholder="Nombre ">
                        </div>
                        <div class="col-md-4">
                            <label for="cli_nat_segund_nombre">Segundo Nombre</label>
                            <input type="text" class="form-control" id="cli_nat_segund_nombre" name="cli_nat_segund_nombre" placeholder="segund nombre">
                        </div>   
                        

                    </div>             
                       
                    <div class="form-group row">

                        <div class="col-md-4">
                            <label for="cli_nat_primer_nombre"> Apellido</label>
                            <input type="text" class="form-control" id="cli_nat_primer_apellido" name="cli_nat_primer_apellido" placeholder="Apellido">
                        </div>

                         <div class="col-md-4">
                            <label for="cli_nat_primer_nombre"> Segundo Apellido</label>
                            <input type="text" class="form-control" id="cli_nat_segund_apellido" name="cli_nat_segund_apellido" placeholder=" Segund Apellido ">
                        </div>
                    </div>
                    <div class="form-group row">       
                            <div class="col-md-4">
                                <label for="correo"> Correo electronico</label>
                                <input type="text" class="form-control" id="cli_nat_correo_electronico" name="cli_nat_correo_electronico" placeholder="correo electronico ">
                            </div>
                   

                                            
                        <div class="col-md-6">
                            <label for="lugar">direccion</label>
                            <select class="form-control-lg" name="fk_lugar" id="fk_lugar">
                                <option value="" selected disabled hidden>Seleccione</option>
                                @foreach($lugares as $lugarA)
                                    <option value="{{$lugarA->lug_codigo}}">{{$lugarA->lug_nombre}}</option>
                                @endforeach
                            </select>
                        </div>  

                    </div>

                        <h3> Metodos de Pago</h3>
                    <div class="form-group row">
                        <div>
                            <label for="tarjetadebito">Numero de Tarjeta de Debito</label>
                            <input type="text" class="form-control" id="" name="" placeholder="nro de tarjeta">
                        </div>    

                        
                    </div>
                        

                  
               
                <div class="form-inline my-auto my-lg-auto" style="margin-left: 45%">
                     <button type="submit" class="btn btn-outline-primary"> Registrar</button>
                </div>
               
            {{form::close()}}
           
   
@endsection