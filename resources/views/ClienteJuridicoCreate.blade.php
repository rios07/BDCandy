@extends('layouts.app')
@section('content')
    <div class="jumbotron text-center">
        <h1 > Registro de Clientes</h1>
 
    </div>
        
            {!! Form::open(array('route' => 'agregar')) !!}
                
               
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="rif">Rif</label>
                            <input type="text" class="form-control" id="cli_jur_rif" name="cli_jur_rif" placeholder="nro de rif">
                        </div>
                       
                        <div class="col-md-4">
                            <label for="cli_jur_denominacion_fiscal">Denominación comercial</label>
                            <input type="text" class="form-control" id="cli_jur_denominacion_fiscal" name="cli_jur_denominacion_fiscal" placeholder="Denominacion Fiscal">
                        </div>

                         <div class="col-md-4">
                            <label for="razonSocial">Razon Social</label>
                            <select type="text" class="form-control-lg" id="cli_jur_razon_social" name="cli_jur_razon_social" placeholder="razon Social">    
                                <option>c.a</option>
                                <option>s.a</option>
                            </select>
                        </div>   

                    </div>             
               
                               
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="correo"> Correo </label>
                            <input type="text" class="form-control" id="cli_jur_correo_electronico" name="cli_jur_correo_electronico" placeholder="correo ">
                        </div>
                        <div class="col-md-4">
                            <label for="paginaWeb">Pagina Web</label>
                            <input type="text" class="form-control" id="cli_jur_pagina_web" name="cli_jur_pagina_web" placeholder="Pagina Web">
                        </div>   
                        <div class="col-md-4">
                            <label for="capitalDisponible">Capital Disponible</label>
                            <input type="text" class="form-control" id="cli_jur_capital_disponible" name="cli_jur_capital_disponible" placeholder="Capital Disponible">
                        </div>

                    </div>             
                       
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="lugar">direccion Fiscal</label>
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