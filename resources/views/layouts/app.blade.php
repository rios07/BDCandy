<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title') - CandyUcab</title>
        <link rel="stylesheet" type="text/css" href="/css/tether.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.css"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" crossorigin="anonymous">
    </head>

    <body>
        <div class="container">
            @yield('content')
        </div>

   

  <!--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script-->

         <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

         <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
         <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="/js/tether.min.js"></script>
        <script type="text/javascript" src="/js/bootstrap.js"></script>
        <script type="text/javascript" src="/js/app/ClienteJuridico.js"></script>  
        <script type="text/javascript" src="{{ asset('/js/app/Tienda.js') }}"></script>
        @yield('scripts')
    </body>
</html>