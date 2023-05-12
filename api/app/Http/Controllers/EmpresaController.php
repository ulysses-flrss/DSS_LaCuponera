<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'cod_empresa' => 'required|regex:/^\w{3}\d{3}$/|unique:empresa',
            'nombre' => 'required|max:255',
            'direccion' => 'required|max:255',
            'telefono' => 'required|regex:/^[2|6|7]{1}\d{3}-\d{4}$/|unique:empresa',
            'correo' => 'required|unique:empresa|email',
            'comision' => 'required|number',
            'cod_rubro' => 'required|max:1'
        ]);


        $empresa = new Empresa();
        $empresa->cod_empresa = $request->input('cod_empresa');
        $empresa->nombre = $request->input('nombre');
        $empresa->direccion = $request->input('direccion');
        $empresa->telefono = $request->input('telefono');
        $empresa->correo = $request->input('comision');
        $empresa->cod_rubro = $request->input('cod_rubro');
        $empresa->save();

    }

    /**
     * Display the specified resource.
     */
    public function show(Empresa $empresa)
    {
        //
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
    public function update(Request $request, Empresa $empresa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->delete();
    }
}
