<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClienteJuridico;
use DB;

class ClienteJuridicoController extends Controller
{
	

    //
    public function Index(){
    	$ClientesJuridicos=DB::table('ClienteJuridico')->get();
       

      
    	
    	return view ('ClienteJuridicoShow', compact('ClientesJuridicos'));

    }

    public function create(){

    }
}
