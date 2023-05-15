<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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



    // Estado -> Espera (aun no ha aprobada/rechazada)
    public function EsperaAprobacion(){
        $ofertas = DB::table('oferta')->where('estado', 'Espera')->get();
        return $ofertas;
    }

    // Estado -> Futura (aprobada y NO en el rango de fecha)
    public function FuturaAprobacion(){
        $ofertas = DB::table('oferta')->where('estado', 'Futura')->get();
        return $ofertas;
    }

    // Estado -> Activa (aprobada y en el rango de fecha)
    public function OfertaActiva(){
        $ofertas = DB::table('oferta')->where('estado', 'Activa')->get();
        return $ofertas;
    }

    // Estado -> Pasada (fue aprobada, pero ya llego al fin de oferta)
    public function OfertaPasada(){
        $ofertas = DB::table('oferta')->where('estado', 'Pasada')->get();
        return $ofertas;
    }

    // Estado -> Rechazada (fue rechazada)
    public function OfertaRechazada(){
        $ofertas = DB::table('oferta')->where('estado', 'Rechazada')->get();
        return $ofertas;
    }
    
    // Estado -> Descartada (quitada por adminOfertas)
    public function OfertaDescartada(){
        $ofertas = DB::table('oferta')->where('estado', 'Descartada')->get();
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
        $validator = Validator::make($request->all(), [
            'titulo' => ['required'],
            'precio_regular' => ['required'],
            'precio_oferta' => ['required'],
            'inicio_oferta' =>['required'],
            'fin_oferta' => ['required'],
            'fechaLimite_cupon' => ['required'],
            'cantidadLimite_cupon' => ['required'],
            'descripcion' => ['required|max:255'],
            'estado' => ['required'],
            'cod_empresa' => ['required'],
        ]);

        if ($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 422);
        }else {
            $ofertas = new Oferta();
            $ofertas->titulo = $request->input('titulo');
            $ofertas->precio_regular = $request->input('precio_regular');
            $ofertas->precio_oferta = $request->input('precio_oferta');
            $ofertas->inicio_oferta = $request->input('inicio_oferta');
            $ofertas->fin_oferta = $request->input('fin_oferta');
            $ofertas->fechaLimite_cupon = $request->input('fechaLimite_cupon');
            $ofertas->cantidadLimite_cupon = $request->input('cantidadLimite_cupon');
            $ofertas->descripcion = $request->input('descripcion');
            $ofertas->estado = $request->input('estado');
            $ofertas->cod_empresa = $request->input('cod_empresa');
            $ofertas->save();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $empresa = DB::table('oferta')->where('cod_oferta', $id)->get();
        return $empresa;
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
        $validator = Validator::make($request->all(), [
            'titulo' => ['required'],
            'precio_regular' => ['required'],
            'precio_oferta' => ['required'],
            'inicio_oferta' =>['required'],
            'fin_oferta' => ['required'],
            'fechaLimite_cupon' => ['required'],
            'cantidadLimite_cupon' => ['required'],
            'descripcion' => ['required|max:255'],
            'estado' => ['required'],
            'cod_empresa' => ['required'],
        ]);

        if ($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 422);
        }else {
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Oferta $oferta)
    {
        $oferta->delete();
    }
}
