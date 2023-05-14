<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = DB::table('usuarios')->where('cod_rol', 'EMP')->get();
        return $empleados;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'correo' => ['required', 'unique:usuarios', 'email'],
            'password'=> ['required'],
            'dui' => ['required', 'unique:usuarios', 'regex:/^\d{8}-\d{1}$/'],
            'nombres' => ['required','max:255'],
            'apellidos' => ['required','max:255'],
            'telefono' => ['required', 'regex:/^[2|6|7]{1}\d{3}-\d{4}$/', 'unique:usuarios'],
            'cod_empresa' => ['required'],
            'cod_rol' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        } else {

        $empleado = new User();
        $empleado->correo = $request->input('correo');
        $empleado->password = Hash::make($request->input('password'));
        $empleado->dui = $request->input('dui');
        $empleado->nombres = $request->input('nombres');
        $empleado->apellidos = $request->input('apellidos');
        $empleado->telefono = $request->input('telefono');
        $empleado->cod_empresa = $request->input('cod_empresa');
        $empleado->cod_rol = $request->input('cod_rol');
        $empleado->save();
    }}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $empleado = DB::table('usuarios')->where('cod_usuario', $id)->get();
        return $empleado;
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
    public function update(Request $request, string $id)
    {

        $empleado = [
            'cod_usuario' => $id,
            'correo' =>$request->correo, 
            'password'=>$request->password, 
            'dui' => $request->dui,
            'nombres' =>$request->nombres, 
            'apellidos' => $request->apellidos,
            'telefono' => $request->telefono,
            'cod_empresa' => $request->cod_empresa,
            'cod_rol' => $request->cod_rol,
        ];

        return DB::update('UPDATE usuarios SET correo=:correo, password=:password, dui=:dui, nombres=:nombres, apellidos=:apellidos,telefono=:telefono, cod_empresa=:cod_empresa, cod_rol=:cod_rol WHERE cod_usuario=:cod_usuario', $empleado);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::delete('DELETE FROM usuarios WHERE cod_usuario=:cod_usuario', ['cod_usuario'=>$id]);
    }
}
