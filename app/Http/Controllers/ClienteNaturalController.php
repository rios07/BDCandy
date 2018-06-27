<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ClienteNatural;
use App\Telefono;
use App\Debito;
Use App\Credito;
Use App\Cheque;
Use App\Lugar;
use DB;

class ClienteNaturalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $ClienteNatural=DB::table('cliente_natural')->get();  
        
        return view ('ClienteNaturalShow', compact('ClienteNatural'));
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
        return view('ClienteNaturalCreate',compact('lugares'));
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

        $ClienteNatural=new ClienteNatural();
       
        $ClienteNatural->cli_nat_rif= $request->cli_nat_rif;       
        $ClienteNatural->cli_nat_ci= $request->cli_nat_ci;
        $ClienteNatural->clie_nat_primer_nombre= $request->clie_nat_primer_nombre;
        $ClienteNatural->cli_nat_segundo_nombre= $request->cli_nat_segundo_nombre;
        $ClienteNatural->cli_nat_primer_apellido= $request->cli_nat_primer_apellido;
        $ClienteNatural->cli_nat_segundo_apellido= $request->cli_nat_segundo_apellido;
        $ClienteNatural->cli_nat_correo_electronico= $request->cli_nat_correo_electronico;       
        $ClienteNatural->fk_lugar=$request->fk_lugar;
        
        $ClienteNatural->save();

      return redirect()->action('ClienteNaturalController@index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cli_nat_rif)
    {
        //
         $ClienteNatural = ClienteNatural::find($cli_nat_rif);
        $lugar = Lugar::where('lug_codigo', $ClienteNatural->fk_lugar)->first();
        return view('ClienteNaturalD', compact('ClienteNatural', 'lugar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($cli_nat_rif)
    {
        //
        $ClienteNatural=ClienteNatural::findOrFail($cli_nat_rif);
        $lugares = Lugar::where('lug_tipo','Parroquia')->orderBy('lug_nombre','asc')->get();
        
        return view ('ClienteNaturalModificar',compact('ClienteNatural','lugares'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cli_nat_rif)
    {
        //
        $ClienteNatural= ClienteNatural::findOrFail($cli_nat_rif);
        $ClienteNatural->cli_nat_rif= $request->input('cli_nat_rif');
        $ClienteNatural->cli_nat_ci= $request->input('cli_nat_ci');
        $ClienteNatural->clie_nat_primer_nombre= $request->input('clie_nat_primer_nombre');
        $ClienteNatural->cli_nat_segundo_nombre= $request->input('cli_nat_segund_nombre');
        $ClienteNatural->cli_nat_primer_apellido= $request->input('cli_nat_primer_apellido');
        $ClienteNatural->cli_nat_segundo_apellido= $request->input('cli_nat_segund_apellido');
        $ClienteNatural->cli_nat_correo_electronico= $request->input('cli_nat_correo_electronico');
        $ClienteNatural->fk_lugar=$request->input('fk_lugar');
        
        $ClienteNatural->save();
        

      return redirect()->action('ClienteNaturalController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cli_nat_rif)
    {
        //        
        $ClienteNatural=DB::table('cliente_natural')->where('cli_nat_rif',$cli_nat_rif)
                                                       ->get();     
        $ClienteNatural= ClienteNatural::findOrFail($cli_nat_rif);
        $ClienteNatural->delete();
        return redirect()->action('ClienteNaturalController@index');
    }
}
