@extends('layouts.app')

@section('content')

    <div class="jumbotron text-center">
        <h1 class=""> Reportes </h1>
        <nav class="navbar navbar-light bg-light justify-content-between">

            <ul class="nav nav-pills">
                <li class="nav-item">  <a class="nav-link" href="{{ url('/') }}"> <b>CandyUcab</b>      </a>     </li>
               
                @guest                    
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->usu_nombre }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest

            </ul>
          </nav>
    </div>

 
        <div class="row">
         
            <table class="table" name="ClienteJ" id="ClienteJ">
                <thead class="thead-dark">
                       <tr>

                        
                        <th scope="col"> rif  </th>
                        <th scope="col"> denominacion fiscal</th>


                    </tr>
                </thead>

                <tbody>
                    @foreach($rol as $roles)
                        <tr>
                           <td>{{ $roles->cli_jur_rif  }}</td> 
                           <td>{{ $roles->cli_jur_denominacion_fiscal }}</td> 

                         




                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> 
@endsection
@section('scripts')
@endsection