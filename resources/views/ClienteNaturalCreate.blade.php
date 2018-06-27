@extends('layouts.app')
@section('title', "Registrar Cliente Natural")
@section('content')

    <div class="jumbotron text-center">
        <h1 > Registro de Clientes</h1>
        <nav class="navbar navbar-light bg-light justify-content-between">
            <ul class="nav nav-pills">
                <li class="nav-item">  <a class="nav-link" href="{{url()->previous()}}"> <b>Regresar al listado de clientes naturales</b></a></li> 
            </ul>
        </nav>
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
                            <label for="cli_nat_segundo_nombre">Segundoo Nombre</label>
                            <input type="text" class="form-control" id="cli_nat_segundo_nombre" name="cli_nat_segundo_nombre" placeholder="segundo nombre">
                        </div>   
                        

                    </div>             
                       
                    <div class="form-group row">

                        <div class="col-md-4">
                            <label for="cli_nat_primer_nombre"> Apellido</label>
                            <input type="text" class="form-control" id="cli_nat_primer_apellido" name="cli_nat_primer_apellido" placeholder="Apellido">
                        </div>

                         <div class="col-md-4">
                            <label for="cli_nat_primer_nombre"> Segundoo Apellido</label>
                            <input type="text" class="form-control" id="cli_nat_segundo_apellido" name="cli_nat_segundo_apellido" placeholder=" Segundo Apellido ">
                        </div>
                    </div>
                    <div class="form-group row">       
                            <div class="col-md-4">
                                <label for="correo"> Correo electronico</label>
                                <input type="text" class="form-control" id="cli_nat_correo_electronico" name="cli_nat_correo_electronico" placeholder="correo electronico ">
                            </div>
                   

                                            
                        <div class="col-md-2">
                            <label for="lugar">Direccion</label>
                            <select class="form-control-lg" name="fk_lugar" id="fk_lugar">
                                <option value="" selected disabled hidden>Seleccione</option>
                                @foreach($lugares as $lugarA)
                                    <option value="{{$lugarA->lug_codigo}}">{{$lugarA->lug_nombre}}</option>
                                @endforeach
                            </select>
                        </div>  

                    </div>

                    <div  class="form-group row" id="div_metodos_pago">
                        <div class="col-md-3" id="debito">
                            <label for="formGroup"> Metodos de Pago </label>
                            <select name="" id="" class="form-control-lg" onchange="myFunction(this)" required>
                                <option value="">Seleccione Metodo </option>
                                <option value="cheque">cheque</option>
                                <option value="debito">debito</option>
                                <option value="credito">credito</option>
                            </select>

                       
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <span class="input-group-btn">
                           <button type="button" class="btn btn-primary" onclick="Metodo_Pago_dinamico()">Otro metodo</button>
                        </span>
                    </div>     
                    <br> 
               
                <div class="form-inline my-auto my-lg-auto" style="margin-left: 45%">
                     <button type="submit" class="btn btn-primary"> Registrar</button>
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
        divtest.innerHTML='<div class="form-group row" id="debito"> <label for="formGroup"> Metodos de Pago </label><select name="" id="" class="form-control-lg" required>  <option value="">Seleccione Metodo </option> <option>cheque</option> <option>debito</option> <option>credito</option> </select><div class="form-group row"<span class="input-group-btn">  <button type="button" class="btn btn-outline-primary" onclick="remove_metodo_pago_dinamico(this)">Eliminar Metodo</button></span></div></div>'
        objeto.appendChild(divtest)  
    }
    
      function Metodo_Pago_dinamico_credito() {
        add++;
        var objeto = document.getElementById('div_metodos_pago');
        var divtest = document.createElement("div");
        divtest.setAttribute("class","form-group removeclass"+add);
        var rdiv ='removeclass'+add;
        divtest.innerHTML='<div class="form-group row"><div class="col-md-3"><label for="numerotarjeta">Numero Tarjeta</label><input type="text" class="form-control" id="med_pag_tar_cred_numero" name="med_pag_tar_cred_numero" placeholder="numero de tarjeta"></div><div class="col-md-3"><label for="cli_nat_ci">nombre impreso</label><input type="text" class="form-control" id="med_pag_tar_cred_tipo" name="med_pag_tar_cred_tipo" placeholder="tipo"></div><div class="col-md-3"><label for="med_pag_cred_banco"> Nombre </label><input type="text" class="form-control" id="med_pag_tar_cred_banco" name="med_pag_tar_cred_banco" placeholder="banco"></div><div class="form-group row"><span class="input-group-btn"><button type="button" class="btn btn-outline-primary" onclick="remove_metodo_pago_dinamico(this)">Eliminar Metodo</button></span></div></div>'
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
        divtest.innerHTML=' <div class="form-group row"><div class="col-md-4"><label for="numerotarjeta">Numero Tarjeta</label><input type="text" class="form-control" id="med_pag_che_numero" name="med_pag_che_numero" placeholder="numero de tarjeta"></div><div class="col-md-4"><label for="cli_nat_ci">nombre impreso</label><input type="text" class="form-control" id="med_pag_che_cuenta" name="med_pag_che_cuenta" placeholder="nombre impreso">   </div><div class="col-md-4"><label for="med_pag_cred_banco"> Nombre </label><input type="text" class="form-control" id="med_pag_che_banco" name="med_pag_che_banco" placeholder="banco"></div><div class="form-group row"><span class="input-group-btn"><button type="button" class="btn btn-outline-primary" onclick="remove_metodo_pago_dinamico(this)">Eliminar Metodo</button></span> </div></div>'
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