<?php

namespace App\Http\Controllers;

use App\servicio;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Traits\ServicioTrait;

class ServicioController extends Controller
{
    use ServicioTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = servicio::all();
        return view('servicios.index')->with('servicios', $servicios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        /**Generamos los años, convertimos a numero la fecha actual pero solo obtenemos el año*/
        $años = $this->añosTrait();
        /**Generamos días  */
        $dias = $this->diasTrait();

        return view('servicios.create')
            ->with('años', $años)
            ->with('dias', $dias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Ahora vamos a realizar la validación dependiendo de cada servicio
        //dd($request->all());


        $this->validate($request, [
            'nombre'    => 'required',
            'costo'     => 'required|numeric|min:1',
            'dias'      =>  'required',
            'año'       =>  'required',
            'category'  =>  'required'

        ]);

        servicio::create([
            'nombre'    =>  $request->nombre,
            'porcion'   =>   $request->porcion,
            'tipo'      =>  $request->tipo,
            'proteina'  =>  $request->proteina,
            'costo'     =>  $request->costo,
            'evento'    =>  $request->evento,
            'invitados' =>  $request->invitados,
            'descripcion'    =>  $request->descripcion,
            'servicio'      =>  $request->servicio,
            'dias'          =>  $request->dias,
            'año'           =>  $request->año,
        ]);

        flash('Se agrego el servicio', 'success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function show(servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit(servicio $servicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, servicio $servicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(servicio $servicio)
    {
        $servicio->delete();
        flash('Se elimino el servicio', 'error');
        return redirect()->route('cotizacion.index');
    }
}
