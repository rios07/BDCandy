<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ClienteNatural;
use App\ClienteJuridico;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolController extends Controller
{
    public function __invoke()
    {
        $roles = DB::table('rol')->orderBy('id','desc')->get();
        $title = "Lista de roles";
        return view('roles.index', compact('roles', 'title'));
    }

    public function create()
    {
        $privilegios = DB::table('privilegio')->get();
        return view('roles.create', compact('privilegios'));
    }

    public function store()
    {
        $data = request()->validate([
            'nombre' => 'required',
            'privilegio' => ''
        ],[
            'nombre.required' => 'El campo nombre es obligatorio',
        ]);
        $role = Role::create(['name' => $data['nombre']]);
        $role->syncPermissions($data['privilegio']);
       return redirect()->route('roles');
    }

    public function show($codigo)
    {
        $rol = Role::find($codigo);
        $privilegios = DB::table('rol_privilegio')
        ->join('privilegio', 'rol_privilegio.permission_id','=','privilegio.id')
        ->where('role_id', $rol->id)
        ->select('privilegio.name')
        ->get();
        return view('roles.show', compact('rol','privilegios'));
    }

    public function edit($codigo){
        $rol = Role::find($codigo);
        $privilegios = Permission::all();
        return view('roles.edit', compact('rol','privilegios'));
    }

    public function update(Role $rol){
        $data = request()->validate([
            'name' => 'required',
            'privilegio' => ''
        ],[
            'name.required' => 'El campo nombre es obligatorio',
        ]);
        $rol->syncPermissions($data['privilegio']);  
        $rol->update(['name' => $data['name']]);
        return redirect()->route('roles');
    }

    public function destroy($codigo)
    {   
        $rol = Role::find($codigo);
        $rol_privilegio = DB::table('rol_privilegio')->where('role_id', $rol->id)->delete();
        $usuario = User::where('fk_rol', $rol->id)->update(['fk_rol' => null]);
        $rol->delete();
        return redirect()->route('roles');
    } 
}