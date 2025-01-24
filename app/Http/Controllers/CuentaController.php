<?php

namespace App\Http\Controllers;

use App\cuenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**Obtenemos las cuentas hasta el momento */
        $cuentas = DB::table('cuentas')->get();
        /**mandamos la información y mostramos la vista */
        //dd($cuentas);
        return view('cuentas.index')->with('cuentas',$cuentas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->number);

        $this->validate($request,[
            'banco'=>'required|string',
            'cuenta'    => 'required|string',
            'number' =>  'required|numeric|digits:16',
            'moneda'    =>  'required',
        ],[
            'number.required' => 'El campo número es requerido',
            'number.size' => 'El campo número debe tener 16 dígitos',
        ]);

        //insertamos los valores
        $account = cuenta::create([
            'banco' => $request->banco,
            'cuenta' => $request->cuenta,
            'number' => $request->number,
            'moneda' => $request->moneda,
        ]);

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function show(cuenta $cuenta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function edit(cuenta $cuenta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cuenta $cuenta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function destroy(cuenta $cuenta)
    {
        //
    }
}
