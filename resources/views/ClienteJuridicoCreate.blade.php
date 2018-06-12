@extends('layouts.app')

@section('content')

    <div class="jumbotron text-center">
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