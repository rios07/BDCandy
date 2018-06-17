<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
<<<<<<< HEAD
    	    	//dd($mensajes);
=======
>>>>>>> francisco

	    return view('welcome',['mensajes' => $mensajes,
	        ]);
	}
  
    public function clientes(){
        $clientes=[
            ['id'=>1,
             'contenido'=>'Clientes Naturales',
             'imagen'=>'image\natural.jpg',
             'direccion'=>'/Clientes/ClientesNaturales'
            ],
            ['id'=>2,
             'contenido'=>'Clientes Juridicos',
             'imagen'=>'image\juridico.jpg',
<<<<<<< HEAD
             'direccion'=>'/Clientes/ClienteJ'
=======
             'direccion'=>'/Clientes/ClientesJuridicos'
>>>>>>> francisco
            ],
        ];
        return view('clientes',['clientes' => $clientes,
            ]);

    } 
<<<<<<< HEAD
    Public function about(){
        return view ('about');
    }
=======
>>>>>>> francisco
}
