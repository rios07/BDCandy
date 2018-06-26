<!doctype html>
<html lang="{{ app()->getLocale() }}" >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo csrf_token() ?>"/>
        <title>@yield('title') - CandyUcab</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.css"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('bower_components/EasyAutocomplete/dist/easy-autocomplete.min.css')}}">
    </head>

    <body >
        <div class="container">
            @yield('content')
        </div>

        <!-- JaavaSCripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="{{asset('ini.js')}}"></script>
        <script src="{{asset('bower_components/riot/riot.min.js')}}"></script>
        <script src="{{asset('bower_components/riot/riot+compiler.min.js')}}"></script>
        <script src="{{asset('bower_components/EasyAutocomplete//dist/jquery.easy-autocomplete.min.js')}}"></script>
        <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="/js/app/ClienteJuridico.js"></script> -->
        @yield('bottom')
        <script>
            function baseUrl(url) {
                return '{{url('')}}/' + url;
            }
        </script>
        {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}        
    </body>
</html>