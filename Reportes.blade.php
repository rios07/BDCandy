@extends('layouts.app')

@section('content')

    <div class="jumbotron text-center">
        <h2 class="display-2"> <b>Reportes</b>   </h2>
        

        <div class="form-group row">
            <div class="col-md-3">
                <a href="{{ url('/reportes/reporte9') }}" class="btn btn-primary btn-lg active" aria-pressed="true">ingresos vs egresos </a>
                
            </div>
            <div class="col-md-3">
                <a href="{{ url('/reportes/reporte10') }}" class="btn btn-primary btn-lg active" aria-pressed="true"> Reporte de asistencia </a>
            </div>
            <div class="col-md-3">
                <a href="{{ url('/reportes/reporte14J') }}" class="btn btn-primary btn-lg active" aria-pressed="true">los 5 mejores clientes J</a>

            </div>
            <div class="col-md-3">
                <a href="{{ url('/reportes/reporte14N') }}" class="btn btn-primary btn-lg active" aria-pressed="true">los 5 mejores clientes N</a>

            </div>  
        </div>
            
        <div class="form-group row">
            <div class="col-md-6">
                <a href="{{ url('/reportes/reporte13J') }}" class="btn btn-primary btn-lg active" aria-pressed="true">10 clientes frecuentes por tienda J</a>
            </div>
             <div class="col-md-6">
                <a href="{{ url('/reportes/reporte13N') }}" class="btn btn-primary btn-lg active" aria-pressed="true">10 clientes frecuentes por tienda N</a>
            </div>
        </div>
           
        
        <div class="form-group row">
            
             <div class="col-md-6">
                <a href="{{ url('/reportes/reporte19') }}" class="btn btn-primary btn-lg active" aria-pressed="true">Productos más vendidos por tienda</a>
                
            </div>
            <div class="col-md-6">
                <a href="{{ url('/reportes/reporte20') }}" class="btn btn-primary btn-lg active"  aria-pressed="true">Ranking de productos por Tienda y por lugar</a>
                
            </div>
           
        </div>
        <div class="form-group row">
            
            <div class="col-md-4">
                <a href="{{ url('/reportes/reporte21') }}" class="btn btn-primary btn-lg active" aria-pressed="true">Ingrediente más utilizado en los productos  </a>
                
            </div>
            
            <div class="col-md-8">
                <a href="{{ url('/reportes/reporte22J') }}" class="btn btn-primary btn-lg active" aria-pressed="true">los 10 mejores clientes en base a la suma de compras en línea y las compras físicas</a>
              
            </div>
        </div>
            <div class="col-md-8">
                <a href="{{ url('/reportes/reporte22N') }}" class="btn btn-primary btn-lg active" aria-pressed="true">los 10 mejores clientes en base a la suma de compras en línea y las compras físicas</a>
              
            </div>
            
    </div>