<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mensaje;

class PagesController extends Controller
{
    public function home(){
    	
    	$mensajes= [
    		['id'=>1,
    		 'contenido'=>'Nuestros Dulces',
    		 'imagen'=>'image\dulces.jpg'
    		],
    		['id'=>2,
    		 'contenido'=>'Nuestros Chocolates',
    		 'imagen'=>'image\chocolates.jpg'
    		],

    	];
    	    	//dd($mensajes);

	    return view('welcome',['mensajes' => $mensajes,
	        ]);
	}

	
	
}
