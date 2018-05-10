@extends('layouts.app')

@section('content')

<h1>Mensaje id: {{$mensaje->id}}</h1>
<img src="{{$mensaje->imagen}}">

<p>
    {{$mensaje->contenido}}
</p>
@endsection 