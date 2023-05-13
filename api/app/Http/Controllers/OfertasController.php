<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfertasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ofertas = DB::table('oferta')->get();
        return $ofertas;
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
            'titulo' => 'required',
            'precio_regular' => 'required',
            'precio_oferta' => 'required',
            'inicio_oferta' => 'required',
            'fin_oferta' => 'required',
            'fechaLimite_cupon' => 'required',
            'descripcion' => 'required|max:255',
            'estado' => 'required',
            'cod_empresa' => 'required',
        ]);

        $ofertas = new Oferta();
        $ofertas->titulo = $request->input('titulo');
        $ofertas->precio_regular = $request->input('precio_regular');
        $ofertas->precio_oferta = $request->input('precio_oferta');
        $ofertas->inicio_oferta = $request->input('inicio_oferta');
        $ofertas->fin_oferta = $request->input('fin_oferta');
        $ofertas->fechaLimite_cupon = $request->input('fechaLimite_cupon');
        $ofertas->descripcion = $request->input('descripcion');
        $ofertas->estado = $request->input('estado');
        $ofertas->cod_empresa = $request->input('cod_empresa');
        $ofertas->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Oferta $oferta)
    {
        $empresa_show = Oferta::find($oferta->cod_empresa);
        return $empresa_show;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Oferta $oferta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Oferta $oferta)
    {
            $request->validate([
                'titulo' => 'required',
                'precio_regular' => 'required',
                'precio_oferta' => 'required',
                'inicio_oferta' => 'required',
                'fin_oferta' => 'required',
                'fechaLimite_cupon' => 'required',
                'descripcion' => 'required|max:255',
                'estado' => 'required',
                'cod_empresa' => 'required',
        ]);

        $ofertas = new Oferta();
        $ofertas->titulo = $request->input('titulo');
        $ofertas->precio_regular = $request->input('precio_regular');
        $ofertas->precio_oferta = $request->input('precio_oferta');
        $ofertas->inicio_oferta = $request->input('inicio_oferta');
        $ofertas->fin_oferta = $request->input('fin_oferta');
        $ofertas->fechaLimite_cupon = $request->input('fechaLimite_cupon');
        $ofertas->descripcion = $request->input('descripcion');
        $ofertas->estado = $request->input('estado');
        $ofertas->cod_empresa = $request->input('cod_empresa');
        $ofertas->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Oferta $oferta)
    {
        $oferta->delete();
    }
}
