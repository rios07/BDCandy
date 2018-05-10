<?php

namespace App\Http\Controllers;

use App\Mensaje;
use Illuminate\Http\Request;


class MensajeController extends Controller
{
    //
    public function show($id){
    	//buscar por id y una vista por mensaje

    	$mensaje=Mensaje::find($id); 
    	
    	return view('Mensajes.show',['mensaje'=>$mensaje,
    	]);
    }
}
