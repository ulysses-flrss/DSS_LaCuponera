<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $empresas = DB::table('empresa')->get();
        $empresas = DB::select("SELECT * FROM empresa INNER JOIN rubro ON empresa.cod_rubro=rubro.cod_rubro");
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
        $validator = Validator::make($request->all(),[
            'cod_empresa' => ['required','regex:/^\w{3}\d{3}$/','unique:empresa'],
            'nombre' => ['required','max:255'],
            'direccion' => ['required','max:255'],
            'telefono' => ['required','regex:/^[2|6|7]{1}\d{3}-\d{4}$/','unique:empresa'],
            'correo' => ['required','unique:empresa','email'],
            'comision' => ['required'],
            'cod_rubro' => ['required','max:1']
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        } else {
            $empresa = new Empresa();
            $empresa->cod_empresa = $request->input('cod_empresa');
            $empresa->nombre = $request->input('nombre');
            $empresa->direccion = $request->input('direccion');
            $empresa->telefono = $request->input('telefono');
            $empresa->correo = $request->input('comision');
            $empresa->comision = $request->input('comision');
            $empresa->cod_rubro = $request->input('cod_rubro');
            $empresa->save();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $empresa = DB::table('empresa')->where('cod_empresa', $id)->get();
        return $empresa;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empresa $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $empresa = [
            'cod_empresa' => $id,
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'comision' => $request->comision,
            'cod_rubro' => $request->cod_rubro
        ];

        return DB::update('UPDATE empresa SET nombre=:nombre, direccion=:direccion,telefono=:telefono, correo=:correo,comision=:comision, cod_rubro=:cod_rubro WHERE cod_empresa=:cod_empresa', $empresa);

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::delete('DELETE FROM empresa WHERE cod_empresa=:cod_empresa', ['cod_empresa'=>$id]);
    }
}
