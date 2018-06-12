@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
    <div class="d-flex justify-content-between align-items-end mb-3">
        <h1 class="pb-1">{{ $title }}</h1>
        <p>
            <a href="#" class="btn btn-primary">Nuevo Producto</a>
        </p>
    </div>

    @if ($productos->isNotEmpty())
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productos as $producto)
        <tr>
            <th scope="row">{{ $producto->pro_codigo }}</th>
            <td>{{ $producto->pro_nombre }}</td>
            <td>
                <form action="#" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <a href="#" class="btn btn-link"><span class="oi oi-eye"></span></a>
                    <a href="#" class="btn btn-link"><span class="oi oi-pencil"></span></a>
                    <button type="submit" class="btn btn-link"><span class="oi oi-trash"></span></button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <p>No hay productos registrados.</p>
    @endif
@endsection