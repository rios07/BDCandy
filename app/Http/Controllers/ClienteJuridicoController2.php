<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClienteJuridico;
use DB;


class ClienteJuridicoController2 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ClientesJuridicos=DB::table('ClienteJuridico')->get();
       

      
        
        return view ('ClienteJuridicoShow', compact('ClientesJuridicos'));
    }

    /**
     * Show the form for creating a new resource.

     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ClienteJuridicoCreate',compact('ClienteJuridico'));

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
       $ClientesJuridico=new ClienteJuridico();

        $ClientesJuridico->rif= $request->rif;
        $ClientesJuridico->denominacionFiscal= $request->denominacionFiscal;
        $ClientesJuridico->correo= $request->correo;
        $ClientesJuridico->paginaWeb= $request->paginaWeb;
        $ClientesJuridico->capitalDisponible= $request->capitalDisponible;

        $ClientesJuridico->save();

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $cliente->delete();
        return redirect()->route('Clientes/ClienteJ');
    }
}
