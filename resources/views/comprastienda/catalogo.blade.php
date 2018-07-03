@extends('layouts.app')
@section('title', 'Catálogo')
@section('content')
    @if ($productos->isNotEmpty())
    <table class="table table-striped" name="producto" id="producto">
        <thead class="thead-dark">
        <tr>
            <th scope="col" class="text-center">Imagen</th>
            <th scope="col" class="text-center">Nombre</th>
            <th scope="col" class="text-center">Precio</th>  
        </tr>
        </thead>
        <tbody>
        @foreach($productos as $producto)
        <tr>
            <td scope="row" class="text-center"><img src="{{ asset('image/'.$producto->pro_imagen)}}" height="75" width="80" ></td>
            <td scope="row" class="text-center">{{ $producto->pro_nombre }}</td>
            <td scope="row" class="text-center">{{ $producto->pro_precio }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <p>No hay productos registrados.</p>
    @endif
@endsection