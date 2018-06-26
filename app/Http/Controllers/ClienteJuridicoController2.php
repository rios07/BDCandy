<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClienteJuridico;
use App\Telefono;
use App\Debito;
Use App\Credito;
Use App\Cheque;
Use App\Contacto;
Use App\Lugar;
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
        $ClientesJuridicos=DB::table('cliente_juridico')->get();         
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
        $lugares= Lugar::where ('lug_tipo','Parroquia')->orderBy('lug_nombre','asc')->get();
        return view('ClienteJuridicoCreate',compact('lugares'));

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

       
        $ClientesJuridico->cli_jur_rif= $request->cli_jur_rif;
       
        $ClientesJuridico->cli_jur_denominacion_fiscal= $request->cli_jur_denominacion_fiscal;
        $ClientesJuridico->cli_jur_razon_social= $request->cli_jur_razon_social;
       
        $ClientesJuridico->cli_jur_correo_electronico= $request->cli_jur_correo_electronico;
       
        $ClientesJuridico->cli_jur_pagina_web= $request->cli_jur_pagina_web;
        $ClientesJuridico->cli_jur_capital_disponible= $request->cli_jur_capital_disponible;
       
        $ClientesJuridico->fk_lugar=$request->fk_lugar;

          $debito=new Debito();
        $debito->med_pag_tar_deb_numero=$request->med_pag_tar_deb_numero;
        $debito->med_pag_tar_deb_tipo=$request->med_pag_tar_deb_tipo;
        $debito->med_pag_tar_deb_banco=$request->med_pag_tar_deb_banco;
        $debito->fk_cliente_juridico=$request->cli_jur_rif;
       
        $credito=new Credito();
        $credito->med_pag_tar_cred_numero;
        $credito->med_pag_tar_cred_tipo;
        $credito->med_pag_tar_cred_banco;
        $credito->med_pag_tar_cred_fecha_vencimiento;
        $credito->fk_cliente_juridico=$request->cli_jur_rif;

        $cheque= new Cheque();
        $cheque->med_pag_che_numero=$request->med_pag_che_numero;
        $cheque->med_pag_che_cuenta=$request->med_pag_che_cuenta;
        $cheque->med_pag_che_banco=$request->med_pag_che_banco;
        $cheque->fk_cliente_juridico=$request->cli_jur_rif;

       
        $ClientesJuridico->save();
         $debito->save();
         $credito->save();
         $cheque->save();

      return redirect()->action('ClienteJuridicoController2@index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cli_jur_rif)
    {
        //
        $ClienteJuridico = ClienteJuridico::find($cli_jur_rif);
        $lugar = Lugar::where('lug_codigo', $ClienteJuridico->fk_lugar)->first();
       
        return view('ClienteJuridicoD', compact('ClienteJuridico', 'lugar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($cli_jur_rif)
    {
        //
        $ClientesJuridico=ClienteJuridico::findOrFail($cli_jur_rif);
        $lugares = Lugar::where('lug_tipo','Parroquia')->orderBy('lug_nombre','asc')->get();
        
        return view ('ClienteJuridicoModificar',compact('ClientesJuridico','lugares'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$cli_jur_rif)
    {   
        //$request=$request->all();
        //return view ('ClienteJuridicoModificar',compact('request'));
       
        $ClientesJuridico= ClienteJuridico::findOrFail($cli_jur_rif);
        $ClientesJuridico->cli_jur_rif= $request->input('cli_jur_rif');
        $ClientesJuridico->cli_jur_denominacion_fiscal= $request->input('cli_jur_denominacion_fiscal');
        $ClientesJuridico->cli_jur_razon_social= $request->input('cli_jur_razon_social');
        $ClientesJuridico->cli_jur_correo_electronico= $request->input('cli_jur_correo_electronico');
        $ClientesJuridico->cli_jur_pagina_web= $request->input('cli_jur_pagina_web');
        $ClientesJuridico->cli_jur_capital_disponible= $request->input('cli_jur_capital_disponible');
        $ClientesJuridico->fk_lugar=$request->input('fk_lugar');
        $ClientesJuridico->save();
        

      return redirect()->action('ClienteJuridicoController2@index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cli_jur_rif)
    {
        //ClientesJuridico->cli_jur_rif
        $ClientesJuridicos=DB::table('cliente_juridico')->where('cli_jur_rif',$cli_jur_rif)
                                                       ->get();
     
        $ClientesJuridicos= ClienteJuridico::findOrFail($cli_jur_rif);
        $ClientesJuridicos->delete();
        return redirect()->action('ClienteJuridicoController2@index');
        
    }
}
