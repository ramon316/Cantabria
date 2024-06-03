<?php

namespace App\Http\Controllers;

use App\evento;
use App\manteleria;
use Illuminate\Http\Request;

class ManteleriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(evento $evento)
    {
        //
        //dd($evento->id);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(evento $evento)
    {
        return view('manteleria.create')->with('evento', $evento);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request['cantidad']);
        //declaramos el array
       $Array = [];
       $NuevoArray = [];

       /**Array_filter elimina los elementos vacios de un array */
       /**Array_merge junta varios arreglos en uno solo */
        $Array = array_filter(array_merge($request->cantidad, $request->nombre, $request->tipo));
        $grupos = count($Array)/3;

        if (is_float($grupos)) {
            return back();
        }
        else{
            
        }

        dd($grupos);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\manteleria  $manteleria
     * @return \Illuminate\Http\Response
     */
    public function show(manteleria $manteleria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\manteleria  $manteleria
     * @return \Illuminate\Http\Response
     */
    public function edit(manteleria $manteleria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\manteleria  $manteleria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, manteleria $manteleria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\manteleria  $manteleria
     * @return \Illuminate\Http\Response
     */
    public function destroy(manteleria $manteleria)
    {
        //
    }
}
