<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Puntos;
use DB;

class PuntosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $punto=DB::table('punto')->get();
        
        return view ('PuntoShow', compact('punto'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('PuntoCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $punto=new Puntos();
       
         
        $punto->pun_valor= $request->pun_valor;
        $punto->pun_fecha_inicio= $request->pun_fecha_inicio;
        $punto->pun_fecha_fin= $request->pun_fecha_fin;
        $punto->save();

        return redirect()->action('PuntosController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($pun_codigo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($pun_codigo)
    {
        //
         $punto=Puntos::findOrFail($pun_codigo);
        
        return view ('PuntoModificar',compact('punto'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pun_codigo)
    {
        //
        $punto= Puntos::findOrFail($pun_codigo);
        $punto->pun_valor= $request->input('pun_valor');
        $punto->pun_fecha_inicio= $request->input('pun_fecha_inicio');
        $punto->pun_fecha_fin= $request->input('pun_fecha_fin');
          $punto->save();
        

      return redirect()->action('PuntosController@index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pun_codigo)
    {
        //
        $punto=DB::table('punto')->where('pun_codigo',$pun_codigo)
                                                       ->get();
     
        $punto= Puntos::findOrFail($pun_codigo);
        $punto->delete();
        return redirect()->action('PuntosController@index');
    }
}
