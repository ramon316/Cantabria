<?php

namespace App\Http\Controllers;

use App\evento;
use App\Precio;
use App\servicio;
use App\EventoServicio;
use App\Traits\EventoTrait;
use App\Traits\ServicioTrait;
use EventoSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventoServicioController extends Controller
{
    use ServicioTrait;
    use EventoTrait;

    private $mensaje = '';
    private $estilo = '';
    private $banderaExiste = true;
    public $evento = '';


    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(evento $evento)
    {
        $this->evento = $evento;
        /* Obtenemos el día del evento dependiento de la fecha de start
        0 es para Domingo, lunes, martes, miercoles y jueves
        1 es para viernes y sabado */
        $diaEvento = $this->diaEvento($evento);
        /* Obtenemos el año del evento */
        $añoEvento = $this->añoEvento($evento);

        /* Obtenemos los servicios que ta estan agregados  */
        $serviciosEvento = $evento->servicio;

        /* Obtenemos todos lose servicios unicos sin repetir*/

        $services = servicio::all();
       /*  $servicios = servicio::select()->
                    Where('dias',$diaEvento)->
                    Where('año',$añoEvento)->
                    where(function($query){
                        $query->orWhere('invitados',$this->evento['invitados'])->
                                orWhere('invitados',null)->
                                orWhere('invitados', 0);
                    })->
                    orderBy('nombre')
                    ->get();
 */

        /* Obtenemos el costo del evento */
        $costoEvento = $this->costoEvento($evento);
        /* Abonos del evento */
        $abonoEvento = $this->abonoEvento($evento);

        /* $Diferencia del costo con lo abonado */
        $diferenciaEvento = $this->diferenciaEvento($evento);

        return view('eventoservicios.create')->
        with('evento',$evento)->
        with('services',$services)->
        with('costoEvento', $costoEvento)->
        with('serviciosEvento', $serviciosEvento)->
        with('abonoEvento',$abonoEvento)->
        with('diferenciaEvento', $diferenciaEvento);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Validamos la información primero  */
        $this->validate($request,[
            'evento'    =>  'required',
            'servicio'  =>  'required',
            'cantidad'  =>  'required|min:0',
        ]);
        /* Datos del evento */
        $evento = evento::select()->whereId($request->evento)->first();

        /* Verificamos si es un servicio propio que seran
        Decoración, Renta del salón, Mesa de dulces, Barra de postres, Bebidas y Pastel*/
        $servicioEvento = servicio::select()->whereId($request->servicio)->first();

        /* Validamos que no tenga ese servicio */
        foreach ($evento->servicio as  $servicio) {
            if ($servicioEvento->id == $servicio->id) {
                $this->mensaje = "Este evento ya cuenta con este servicio, no es posible agregarlo";
                $this->estilo = "alert-danger";
                $this->banderaExiste = false;
            }
        }

        /* Agregamos el registro en la tabla pivote */
        if ($this->banderaExiste) {
            $evento->servicio()->attach($servicioEvento->id, ['cantidad'=> $request->cantidad, 'costo' =>$servicioEvento->costo, 'regalo' => $request->regalo]);

        }
        flash('Servicio agregado con éxito');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EventoServicio  $eventoServicio
     * @return \Illuminate\Http\Response
     */
    public function show(EventoServicio $eventoServicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EventoServicio  $eventoServicio
     * @return \Illuminate\Http\Response
     */
    public function edit(EventoServicio $eventoServicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EventoServicio  $eventoServicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventoServicio $eventoServicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EventoServicio  $eventoServicio
     * @return \Illuminate\Http\Response
     */
    public function destroy($servicio, $evento)
    {
        //dd('el servicio es el :'. $servicio . ' y la cotizacion es: '. $evento);
        $evento = evento::find($evento);
        $evento->servicio()->detach($servicio);
        flash('Servicio eliminado', 'error');
        return back();
    }
}
