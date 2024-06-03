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
    
        $this->validate($request,[
            'banco'=>'required|string',
            'cuenta'    => 'required|string',
            'clabe' =>  'required|size:18',
            'moneda'    =>  'required',
        ]);

        //insertamos los valores
        DB::table('cuentas')->insert([
            'banco'     =>      $request['banco'],
            'cuenta'    =>      $request['cuenta'],
            'clabe'     =>      $request['clabe'],
            'moneda'    =>      $request['moneda'],
            'created_at'    =>  date('Y-m-d H:i:s'),
            'updated_at'    =>  date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('cuentas.index');

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
