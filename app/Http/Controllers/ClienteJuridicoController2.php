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
       
        $ClientesJuridico->cli_jur_denominacionComercial= $request->cli_jur_denominacionComercial;
        $ClientesJuridico->cli_jur_razon_social= $request->cli_jur_razon_social;
       
        $ClientesJuridico->cli_jur_correoElectronico= $request->cli_jur_correoElectronico;
       
        $ClientesJuridico->cli_jur_paginaWeb= $request->cli_jur_paginaWeb;
        $ClientesJuridico->cli_jur_capitalDisponible= $request->cli_jur_capitalDisponible;
       
        $ClientesJuridico->fk_lugarFiscal=$request->fk_lugarFiscal;
        $ClientesJuridico->fk_lugarPrincipal=$request->fk_lugarPrincipal;
        $ClientesJuridico->save();

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
        $lugar = Lugar::where('lug_codigo', $ClienteJuridico->fk_lugarFiscal)->first();
        $lugarb = Lugar::where('lug_codigo', $ClienteJuridico->fk_lugarPrincipal)->first();
        return view('ClienteJuridicoD', compact('ClienteJuridico', 'lugar','lugarb'));
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
        $ClientesJuridico->cli_jur_denominacionComercial= $request->input('cli_jur_denominacionComercial');
        $ClientesJuridico->cli_jur_razon_social= $request->input('cli_jur_razon_social');
        $ClientesJuridico->cli_jur_correoElectronico= $request->input('cli_jur_correoElectronico');
        $ClientesJuridico->cli_jur_paginaWeb= $request->input('cli_jur_paginaWeb');
        $ClientesJuridico->cli_jur_capitalDisponible= $request->input('cli_jur_capitalDisponible');
        $ClientesJuridico->fk_lugarFiscal=$request->input('fk_lugarFiscal');
        $ClientesJuridico->fk_lugarPrincipal=$request->input('fk_lugarPrincipal');
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
        $ClientesJuridicos=DB::table('ClienteJuridico')->where('cli_jur_rif',$cli_jur_rif)
                                                       ->get();
     
        $ClientesJuridicos= ClienteJuridico::findOrFail($cli_jur_rif);
        $ClientesJuridicos->delete();
        return redirect()->action('ClienteJuridicoController2@index');
        
    }
}
