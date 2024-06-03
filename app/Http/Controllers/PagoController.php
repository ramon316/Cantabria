<?php

namespace App\Http\Controllers;

use App\cliente;
use App\pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Fluent;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //buscamos la información necesaria
        /**mostramos los clientes con el ordenado ascendente */
        $clientes = cliente::orderBy('nombre','asc')->get();
        return view('pagos.index')->with('clientes',$clientes);
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
            'tipo'  => 'required',
            'monto'=>   'required|integer',
            'cuenta'    =>  'required',
        ]);
        //return $request;
        DB::table('pagos')->insert([
            'cliente_id'    =>  $request['cliente'],
            'user_id'       =>  Auth::user()->id,
            'evento_id'     =>  $request['evento'],
            'cuenta_id'     =>  $request['cuenta'],
            'monto'         =>  $request['monto'],
            'tipo'          =>  $request['tipo'],
            'created_at'    =>  date('Y-m-d H:i:s'),
            'updated_at'    =>  date('Y-m-d H:i:s'),
        ]);
        flash('Se agrego el pago ccon écito');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show(pago $pago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit(pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pago $pago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy(pago $pago)
    {
        //
    }
}
