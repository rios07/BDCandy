<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ClienteNatural;
use App\ClienteJuridico;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function __invoke()
    {
        $usuarios = User::orderBy('usu_codigo', 'desc')->get();
        $roles = DB::table('rol')->get();
        $title = "Lista de usuarios";
        return view('usuarios.index', compact('usuarios','roles', 'title'));
    }

    public function show($codigo)
    {
    	$usuario = User::find($codigo);
    	$roles = DB::table('rol')->get();
    	if (isset($usuario->fk_cliente_natural))
    		$datos = ClienteNatural::where('cli_nat_rif', $usuario->fk_cliente_natural)->first();
    	else
    		if (isset($usuario->fk_cliente_juridico))
    			$datos = ClienteJuridico::where('cli_jur_rif', $usuario->fk_cliente_juridico)->first();
    		else
    			if(isset($usuario->fk_empleado))
    				$datos = DB::table('empleado')->where('emp_codigo', $usuario->fk_empleado)->first();
    	return view('usuarios.show', compact('usuario','datos','roles'));
    }

    public function rol($codigo)
    {
    	$usuario = User::find($codigo);
    	$roles = DB::table('rol')->get();
    	return view('usuarios.rol', compact('usuario', 'roles'));
    }

    public function update(User $usuario)
    {
    	$data = request()->validate([
            'fk_rol' => 'required',
        ],[
            'fk_rol.required' => 'El campo rol es obligatorio',
        ]);
        $fk_rol = DB::table('rol')->where('name', $data['fk_rol'])->first();
        $usuario->syncRoles([$data['fk_rol']]);
        $usuario->update(['fk_rol' => $fk_rol->id]);
        return redirect()->route('usuarios');
    }

    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios');
    }  
}