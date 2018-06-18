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
                            <label for="denominacionFiscal">Denominación comercial</label>
                            <input type="text" class="form-control" id="cli_jur_denominacionComercial" name="cli_jur_denominacionComercial" placeholder="Denominacion Comercial">
                        </div>

                         <div class="col-md-4">
                            <label for="razonSocial">Razon Social</label>
                            <select type="text" class="form-control" id="cli_jur_razon_social" name="cli_jur_razon_social" placeholder="razon Social">    
                                <option>c.a</option>
                                <option>s.a</option>
                            </select>
                        </div>   

                    </div>             
               
                               
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="correo"> Correo </label>
                            <input type="text" class="form-control" id="cli_jur_correoElectronico" name="cli_jur_correoElectronico" placeholder="correo ">
                        </div>
                        <div class="col-md-4">
                            <label for="paginaWeb">Pagina Web</label>
                            <input type="text" class="form-control" id="cli_jur_paginaWeb" name="cli_jur_paginaWeb" placeholder="Pagina Web">
                        </div>   
                        <div class="col-md-4">
                            <label for="capitalDisponible">Capital Disponible</label>
                            <input type="text" class="form-control" id="cli_jur_capitalDisponible" name="cli_jur_capitalDisponible" placeholder="Capital Disponible">
                        </div>

                    </div>             
                       
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="lugar">direccion Fiscal</label>
                            <select class="form-control" name="fk_lugarPrincipal" id="fk_lugarPrincipal">
                                <option value="" selected disabled hidden>Seleccione</option>
                                @foreach($lugares as $lugarA)
                                    <option value="{{$lugarA->lug_codigo}}">{{$lugarA->lug_nombre}}</option>
                                @endforeach
                            </select>
                        </div>  
                        <div class="col-md-6">
                            <label for="lugar">direccion Principal</label>
                            <select class="form-control" name="fk_lugarFiscal" id="fk_lugarFiscal">
                                <option value="" selected disabled hidden>Seleccione</option>
                                @foreach($lugares as $lugarB)
                                    <option value="{{$lugarB->lug_codigo}}">{{$lugarB->lug_nombre}}</option>
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