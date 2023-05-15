<?php

namespace App\Http\Controllers;

use App\Models\Rubro;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Rubro as GlobalRubro;

class RubroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rubros = DB::table('rubro')->where('cod_rubro', 'RUB')->get();
        return $rubros;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'rubro' => ['required','max:255']
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        } else {

        $rubro = new Rubro();
        $rubro->rubro = $request->input('rubro');
        $rubro->save();
    }}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rubro = DB::table('rubro')->where('cod_rubro', $id)->get();
        return $rubro;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rubro = [
            'cod_rubro' => $id,
            'rubro' =>$request->rubro, 
        ];

        return DB::update('UPDATE rubro SET rubro=:rubro WHERE cod_rubro=:cod_rubro', $rubro);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        DB::delete('DELETE FROM rubro WHERE cod_rubro=:cod_rubro', ['cod_rubro'=>$id]);
    }
}
