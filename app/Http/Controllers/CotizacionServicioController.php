<?php

namespace App\Http\Controllers;

use App\servicio;
use App\cotizacion;
use Illuminate\Http\Request;
use App\Traits\CotizacionTrait;
use Illuminate\Support\Facades\DB;

class CotizacionServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     /* trait */
     use CotizacionTrait;

    private $mensaje = '';
    private $estilo = '';
    private $banderaExiste = true;

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(cotizacion $cotizacion)
    {
        /* Obtenemos el día del evento dependiento de la fecha de start
        0 es para Domingo, lunes, martes, miercoles y jueves
        1 es para viernes y sabado */
        $diaEvento = $this->diaCotizacion($cotizacion);

        /* Obtenemos el año del evento */
        $añoEvento = $this->añoCotizacion($cotizacion);

        /* Obtenemos los servicios ya agregados de la cotización */
        $serviciosCotizacion = $cotizacion->servicio;

        /* Obtenemos todos lose servicios unicos sin repetir*/
        $servicios = servicio::select()->
                    where('invitados',$cotizacion->invitados)->
                    orWhere('invitados',null)->
                    Where('dias',$diaEvento)->
                    Where('año',$añoEvento)->
                    orderBy('nombre')->
                    get();


        $servicios = $servicios->unique('nombre');
        /* Obtenemos el costo del evento */
        $costoCotizacion = $this->costoCotizacion($cotizacion);
        /**Return de view */
        return view('cotizacionservicio.create')
        ->with('cotizacion',$cotizacion)
        ->with('servicios',$servicios)
        ->with('costoCotizacion', $costoCotizacion)
        ->with('serviciosCotizacion', $serviciosCotizacion);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /* Vamos agregar nuestra store guardadno los servicios */
        /* Validamos la información primero  */
        $this->validate($request,[
            'cotizacion'    =>  'required',
            'servicio'  =>  'required',
            'cantidad'  =>  'required|min:0',
        ]);


        /* Datos de la cotización */
        $cotizacion = cotizacion::whereId($request->cotizacion)->first();

        /* Verificamos si es un servicio propio que seran
        Decoración, Renta del salón, Mesa de dulces, Barra de postres, Bebidas y Pastel*/
        $servicioCotizacion = servicio::whereId($request->servicio)->first();

        /* Validamos que no tenga ese servicio */
        foreach ($cotizacion->servicio as  $servicio) {
            if ($servicioCotizacion->id == $servicio->id) {
                flash('Esta cotización ya cuenta con el servicio', 'error');
                $this->banderaExiste = false;
            }
        }
        /* Agregamos el registro en la tabla pivote */

        if ($this->banderaExiste) {
            $cotizacion->servicio()->attach($servicioCotizacion->id, ['cantidad'=> $request->cantidad, 'costo' => $servicioCotizacion->costo, 'regalo' => $request->regalo]);
           flash('Servicio agregado con éxito');
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($servicio, $cotizacion)
    {
/*         dd('el servicio es el :'. $servicio . ' y la cotizacion es: '. $cotizacion);
 */     $cotizacion = cotizacion::find($cotizacion);
        $cotizacion->servicio()->detach($servicio);
        return back();
    }
}
