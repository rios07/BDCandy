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
                            <select type="text" class="form-control" id="cli_jur_razon_social" name="cli_jur_razon_social" placeholder="razon Social">    
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
                            <select class="form-control" name="fk_lugar" id="fk_lugar">
                                <option value="" selected disabled hidden>Seleccione</option>
                                @foreach($lugares as $lugarA)
                                    <option value="{{$lugarA->lug_codigo}}">{{$lugarA->lug_nombre}}</option>
                                @endforeach
                            </select>
                        </div>  
                        

                    </div>

                        <h3> Metodos de Pago</h3>
                    <div  class="form-group row" id="div_metodos_pago">
                        <div class="col-md-3" id="debito">
                            <label for="formGroup"> Metodos de Pago </label>
                            <select name="" id="" class="form-control" onchange="myFunction(this)" required>
                                <option value="">Seleccione Metodo </option>
                                <option value="cheque">cheque</option>
                                <option value="debito">debito</option>
                                <option value="credito">credito</option>
                            </select>

                       
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <span class="input-group-btn">
                           <button type="button" class="btn btn-outline-primary" onclick="Metodo_Pago_dinamico()">Otro metodo</button>
                        </span>
                    </div>      
                        

               
                <div class="form-inline my-auto my-lg-auto" style="margin-left: 45%">
                     <button type="submit" class="btn btn-outline-primary"> Registrar</button>
                </div>               
            {{form::close()}}
<script>
    var add=1;
    function Metodo_Pago_dinamico() {
        add++;
        var objeto = document.getElementById('div_metodos_pago');
        var divtest = document.createElement("div");
        divtest.setAttribute("class","form-group removeclass"+add);
        var rdiv ='removeclass'+add;
        divtest.innerHTML='<div class="form-group row" id="debito"> <label for="formGroup"> Metodos de Pago </label><select name="" id="" class="form-control" required>  <option value="">Seleccione Metodo </option> <option>cheque</option> <option>debito</option> <option>credito</option> </select><div class="form-group row"<span class="input-group-btn">  <button type="button" class="btn btn-outline-primary" onclick="remove_metodo_pago_dinamico(this)">Eliminar Metodo</button></span></div></div>'
        objeto.appendChild(divtest)  
    }
    
      function Metodo_Pago_dinamico_credito() {
        add++;
        var objeto = document.getElementById('div_metodos_pago');
        var divtest = document.createElement("div");
        divtest.setAttribute("class","form-group removeclass"+add);
        var rdiv ='removeclass'+add;
        divtest.innerHTML='<div class="form-group row"><div class="col-md-3"><label for="numerotarjeta">Numero Tarjeta</label><input type="text" class="form-control" id="med_pag_cred_tar_numero" name="med_pag_cred_tar_numero" placeholder="numero de tarjeta"></div><div class="col-md-3"><label for="cli_nat_ci">nombre impreso</label><input type="text" class="form-control" id="med_pag_cred_tar_tipo" name="med_pag_cred_tar_tipo" placeholder="tipo"></div><div class="col-md-3"><label for="med_pag_cred_banco"> Nombre </label><input type="text" class="form-control" id="med_pag_cred_tar_banco" name="med_pag_cred_tar_banco" placeholder="banco"></div><div class="form-group row"><span class="input-group-btn"><button type="button" class="btn btn-outline-primary" onclick="remove_metodo_pago_dinamico(this)">Eliminar Metodo</button></span></div></div>'
        objeto.appendChild(divtest)  
    }
      function Metodo_Pago_dinamico_debito() {
        add++;
        var objeto = document.getElementById('div_metodos_pago');
        var divtest = document.createElement("div");
        divtest.setAttribute("class","form-group removeclass"+add);
        var rdiv ='removeclass'+add;
        divtest.innerHTML= '<div class="form-group row"><div class="col-md-4"><label for="numerotarjeta">Numero Tarjeta</label><input type="text" class="form-control" id="med_pag_tar_deb_numero" name="med_pag_tar_deb_numero"placeholder="numero de tarjeta"></div><div class="col-md-4"><label for="med_pag_tar_deb_tipo">nombre impreso</label><input type="text" class="form-control" id="med_pag_tar_deb_tipo" name="med_pag_tar_deb_tipo" placeholder="nombre impreso"></div><div class="col-md-4"><label for="med_pag_tar_deb_banco"> Nombre </label><input type="text" class="form-control" id="med_pag_tar_deb_banco" name="med_pag_tar_deb_banco" placeholder="banco"></div> <div class="form-group row"><span class="input-group-btn"><button type="button" class="btn btn-outline-primary" onclick="remove_metodo_pago_dinamico(this)">Eliminar Metodo</button></span></div> </div>'   
        objeto.appendChild(divtest)  
    }
       function Metodo_Pago_dinamico_cheque() {
        add++;
        var objeto = document.getElementById('div_metodos_pago');
        var divtest = document.createElement("div");
        divtest.setAttribute("class","form-group removeclass"+add);
        var rdiv ='removeclass'+add;
        divtest.innerHTML=' <div class="form-group row"><div class="col-md-4"><label for="numerotarjeta">Numero Tarjeta</label><input type="text" class="form-control" id="med_pag_che_numero" name="med_pag_che_numero" placeholder="numero de tarjeta"></div><div class="col-md-4"><label for="cli_nat_ci">nombre impreso</label><input type="text" class="form-control" id="med_pag_che_cuenta" name="med_pag_che_cuenta" placeholder="nombre impreso">   </div><div class="col-md-4"><label for="med_pag_cred_banco"> Nombre </label><input type="text" class="form-control" id="med_pag_che_banco" name="med_pag_che_banco" placeholder="banco"></div><div class="form-group row"><span class="input-group-btn"><button type="button" class="btn btn-outline-primary" onclick="remove_metodo_pago_dinamico(this)">Eliminar Metodo</button></span> </div></div>   '
        objeto.appendChild(divtest)  
    }
    
    function remove_metodo_pago_dinamico(elemento) {
        var objeto=elemento.parentNode.parentNode;
        console.log(objeto);   
        elemento.parentNode.parentNode.parentNode.removeChild(objeto);

    }

    function myFunction(elemento) {
        var x = elemento.value;
        if (x=='credito') {

            Metodo_Pago_dinamico_credito();
        }
        else if(x=='debito'){
 
            Metodo_Pago_dinamico_debito();
        }
        else if (x=='cheque') {
  
            Metodo_Pago_dinamico_cheque();
        }
    }

</script>



@endsection

