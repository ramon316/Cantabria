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


        return view('servicios.create')
            ->with('años', $años);
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
            'año'       =>  'required',
            'category'  =>  'required'
        ]);

        servicio::create([
            'nombre'    =>  $request->nombre,
            'costo'     =>  $request->costo,
            'categoria'      =>  $request->category,
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
        /**Generamos los años, convertimos a numero la fecha actual pero solo obtenemos el año*/
        $años = $this->añosTrait();

        return view('servicios.edit')->with('servicio', $servicio)
                                        ->with('años', $años);
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
        $this->validate($request, [
            'nombre'    => 'required',
            'año'       =>  'required',
            'category'  =>  'required'
        ]);

        $servicio->update([
            'nombre'    =>  $request->nombre,
            'categoria'      =>  $request->category,
            'año'           =>  $request->año,
        ]);

        flash('Se actualizo el servicio', 'success');
        return back();
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
