<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Usuario;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresas = DB::table('empleado')->get();
        return $empresas;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'correo' => 'required|unique:empresa|email',
            'password'=>'required',
            'dui'=>'required|unique:usuario|regex:/^\d{8}-\d{1}$/',
            'nombres' => 'required|max:255',
            'apellidos' => 'required|max:255',
            'telefono' => 'required|regex:/^[2|6|7]{1}\d{3}-\d{4}$/|unique:usuario',
            'cod_empresa' => 'required',
            'cod_rol' => 'required'
        ]);


        $empleado = new User();
        $empleado->correo = $request->input('correo');
        $empleado->password = $request->input('password');
        $empleado->nombres = $request->input('nombres');
        $empleado->apellidos = $request->input('apellidos');
        $empleado->telefono = $request->input('telefono');
        $empleado->cod_empresa = $request->input('cod_empresa');
        $empleado->cod_rol = $request->input('cod_rol');
        $empleado->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(User $usuario)
    {
        $usuario_show = User::find($usuario->id);
        return $usuario_show;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $usuario)
    {
        $request->validate([
            'correo' => 'required|unique:empresa|email',
            'password'=>'required',
            'dui'=>'required|unique:usuario|regex:/^\d{8}-\d{1}$/',
            'nombres' => 'required|max:255',
            'apellidos' => 'required|max:255',
            'telefono' => 'required|regex:/^[2|6|7]{1}\d{3}-\d{4}$/|unique:usuario',
            'cod_empresa' => 'required',
            'cod_rol' => 'required'
        ]);


        $empleado = new User();
        $empleado->correo = $request->input('correo');
        $empleado->password = $request->input('password');
        $empleado->nombres = $request->input('nombres');
        $empleado->apellidos = $request->input('apellidos');
        $empleado->telefono = $request->input('telefono');
        $empleado->cod_empresa = $request->input('cod_empresa');
        $empleado->cod_rol = $request->input('cod_rol');
        $empleado->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $usuario)
    {
        $usuario->delete();
    }
}
