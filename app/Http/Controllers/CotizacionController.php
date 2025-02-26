<?php

namespace App\Http\Controllers;

use stdClass;
use App\Precio;
use App\cliente;
use App\cotizacion;
use App\NumerosALetras;
use App\Traits\CotizacionTrait;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     use CotizacionTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        /**Obtenemos el id del usuario */
        $UsuarioId= auth()->user()->id;
        // return dd($UsuarioID);
        /**buscamos las cotizaciones de este usuario para pasarlas a la paginación */
        $cotizaciones = cotizacion::where('user_id',$UsuarioId)->paginate(10);
        // return $cotizaciones;
        return view('cotizacion.index')->with('cotizaciones',$cotizaciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /**Retornmamos la vista*/
        $clientes = cliente::select('nombre','id')->get();
        return view('cotizacion.create')->with('clientes',$clientes);
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
            'cliente'=> 'required',
            'evento' => 'required',
            'horas' => 'required',
            'start'=> 'required',
            'end'   => 'required',
            'invitados' => 'required|numeric|min:1',
        ]);
        //dd($request['cliente']);
        /* Vamos a validar la fecha de validez antes de guardarlo. */
        $validez = $request['validez'];
        $date = Carbon::now();
        $fechaFinal = $date->addDay($validez);


        cotizacion::create([
            'cliente_id'            =>$request['cliente'],
            'title'                 =>$request['evento'],
            'horas'                 =>$request['horas'],
            'start'                 =>$request['start'],
            'end'                   =>$request['end'],
            'invitados'             =>$request['invitados'],
            'validez'               =>$fechaFinal,
            'created_at'            =>date('Y-m-d H:i:s'),
            'updated_at'            =>date('Y-m-d H:i:s'),
        ]);

        $registroNuevo = cotizacion::latest('id')->first('id');


        flash()->addSuccess('Se ha guardado la cotización.');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function show(cotizacion $cotizacion)
    {
       /* Obtenemos el precio de la cotización */

        /**Mostramos el precio del evento */
        $año = Carbon::parse($cotizacion->start);
        $año = $año->year;

        /**Ahora los servicios que tiene la cotización */
        $servicios = $cotizacion->servicio;

        /* Obtenemos el costo del evento */
        $costoCotizacion = $this->costoCotizacion($cotizacion);

        return view('cotizacion.show')
        ->with('servicios',$servicios)
        ->with('cotizacion',$cotizacion)
        ->with('costoCotizacion',$costoCotizacion);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function edit(cotizacion $cotizacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cotizacion $cotizacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(cotizacion $cotizacion)
    {
        //
        /* dd($cotizacion); */
        $cotizacion->delete();
        return redirect()->route('cotizacion.index');
    }

    /**Generamos el contrato y lo almacenamos en /storage/contratos/id_cliente-id_eventos-fecha */
    public function cotizacion(cotizacion $cotizacion){
        /* Verificamos servicios */
        /* Verificamos la deccoración, si existe retornamos el servicio */
        $ExistDecoracion = $this->decoracionExistTrait($cotizacion);

        /* Obtenemos el precio de la cotización */
        $costo = $this->costoCotizacion($cotizacion);

        /* obtenemos los servicios del evento */
        $servicios = $this->serviciosTrait($cotizacion);

        /* obtener los servicios de cortesia */
        $servicesCortesy = $this->servicesCortesyTrait($cotizacion);

        $costoTexto = strtoupper(NumerosALetras::convertir($costo,'Pesos',false,'Centavos'));
        $today = Carbon::parse(date('d-m-Y'))->translatedFormat('l j \d\e F \d\e Y');
        $eventDay = Carbon::parse($cotizacion->start)->translatedFormat('l j \d\e F \d\e Y');
        $end  = Carbon::parse($cotizacion->end)->translatedFormat('l j \d\e F \d\e Y');
        // return $cotizacion;
        $pdf=PDF::loadView('/cotizacion/cotizacion',compact('cotizacion','costo','costoTexto','servicios','today','eventDay', 'end','ExistDecoracion','servicesCortesy'));
        $pdf->setPaper('letter','portrait');
        $name = $cotizacion->id.'_'.$cotizacion->cliente->nombre.'_cotizacion.pdf';
        /**return $pdf->download($name); en caso de que deseamos descargarlo directamente */
        return $pdf->stream($name);
        //return view('eventos.contrato')->with('evento',$evento);
    }
}
