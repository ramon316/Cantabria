<?php

namespace App\Http\Controllers;

use Error;
use App\pago;
use App\Tipo;
use stdClass;
use App\cuenta;
use App\evento;
use App\Precio;
use App\cliente;
use App\servicio;
use App\Checklist;
use Carbon\Carbon;
use Spatie\Permission;
use App\EventoServicio;
use App\NumerosALetras;
use Tightenco\Ziggy\Ziggy;
use App\Traits\EventoTrait;
use Illuminate\Support\Str;
use App\Events\EventCreated;
use App\meet;
use App\Notifications\contractInformation;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Validated;
use Intervention\Image\Facades\Image;
use Illuminate\Session\SessionManager;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Normalizer\SlugNormalizer;
use NumberFormatter;


use function PHPUnit\Framework\isEmpty;

class EventoController extends Controller
{
    use EventoTrait;

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
        $eventos = evento::paginate(10);
        return view('eventos.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //DB::table('clientes')->get()->pluck('id','nombre')->dd();
        $clientes = DB::table('clientes')->orderBy('nombre')->get()->pluck('nombre', 'id');
        $tipos = Tipo::OrderBy('tipo', 'asc')->get();
        /**agregamos todos las consultas */
        return view('eventos.create')
            ->with('clientes', $clientes)
            ->with('tipos', $tipos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, SessionManager $sessionManager)
    {
        //dd($request->all());

        $this->validate($request, [
            'cliente' => 'required',
            'evento' => 'required',
            'horas' => 'required',
            'start' => 'unique:eventos|required',
            'end'   => 'required',
            'invitados' => 'required|numeric|min:1',
        ]);
        //dd($request->all());

        /**Validamos los precios con la fecha para saber que día es */
        /**Aqui tenemos el día de la semana 1 lunes a 7 domingo */
        //$dia = date('N',strtotime($request['start']));
        /**validamos si es viernes o sabado */

        /**Validamos el año para saber que año es el avento y así tomar el precio del año */
        //$fecha = Carbon::parse($request['start']);
        //$año = $fecha->year;

        /**Aqui ya tenemos nuestro precio establecido con el día del evento */
        //$precio = DB::table('precios')->where('invitados',$request['invitados'])->where('dias',$dias)->where('año',$año)->first();
        //dd($precio);

        /**En caso de que no encuentre precio mostrara el mensaje */
        /*if ($precio === null) {
           dd($request);
            return back()->with('mensaje', 'No contamos con precios para este evento');
        }*/

        /* Validamos el color del evento */
        /* if ($request['evento'] == 'boda') {
            $color = '#0000ff';
        } elseif ($request['evento'] == 'capacitacion') {
            $color = '#800080';
        } elseif ($request['evento'] == 'graduacion') {
            $color = '#d2691e';
        } else {
            $color = '#ff8c00';
        } */

        /**Agregamos el evento */
        $evento = Evento::create([
            'cliente_id'            => $request['cliente'],
            'user_id'               => auth()->user()->id,
            'title'                 => $request['evento'],
            'start'                 => $request['start'],
            'end'                   => $request['end'],
            'invitados'             => $request['invitados'],
        ]);

        /* Apply the event */
        event(new EventCreated($evento));

        //dd($request->all());
        //Podemos hacerlo con modelo pero aun no le entiendo a eso
        /**Redireccionamos a home*/
        flash('Evento creado con éxito');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(evento $evento)
    {
        $CostoEvento = $this->costoEvento($evento);

        /* get all pay */
        $pagos = pago::whereEventoId($evento->id)->get();

        /* sum all pays */
        $monto  = 0;
        foreach ($pagos as $pago) {
            $monto = $pago->monto + $monto;
        }

        /* Verificamos si cuenta con servicio banquete */
        $banquete = $evento->servicio()->where('nombre', 'banquete')->get();
        /* Verificamos si ya lo capturaron el detalle banquete */
        $detalleBanquet = evento::where('id', $evento->id)->whereHas('banquet')->first();

        /* Saber si es administrador */
        $admin = Auth::user()->hasRole('Administrador');

        /* Abonos del evento */
        $abonoEvento = $this->abonoEvento($evento);

        /* $Diferencia del costo con lo abonado */
        $diferenciaEvento = $this->diferenciaEvento($evento);

        /* Mostrar los valores del checklist */
        $checklist = Checklist::where('evento_id', $evento->id)->first();

        /* Discount */
        $discount = $evento->discount->amount ?? 0;


        /* Total del evento */
        $total = $this->totalEvento($evento);

        /* Contiene un servicio de banquete */
        $banquetExist = $this->banquetExistTrait($evento);

        /* Valores del Checklist */
        /* dd($evento->banquet()->count()); */
        /** mostramos la información del evento*/
        return view('eventos.show')
            ->with('evento', $evento)
            ->with('costoEvento', $CostoEvento)
            ->with('pagos', $pagos)
            ->with('monto', $monto)
            ->with('admin', $admin)
            ->with('banquete', $banquete)
            ->with('detalleBanquet', $detalleBanquet)
            ->with('abonoEvento', $abonoEvento)
            ->with('diferenciaEvento', $diferenciaEvento)
            ->with('checklist', $checklist)
            ->with('discount', $discount)
            ->with('total', $total)
            ->with('banquetExist', $banquetExist);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(evento $evento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, evento $evento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy(evento $evento)
    {
        //dd('estamos en destroy' . $evento->id);
        //Eliminamos el registro de nuestro evento
        $evento->delete();
        /**Redireccionamos */
        return redirect()->route('eventos.index');
    }

    public function list()
    {
        //Se muestras solo sus eventos creados, se utiliza eventos por que asi se llamo a la función del metodo USER.
        $eventos = evento::where('start', '>=', date('Y-m-d'))->get();
        /* Obtenemos la colección de meets */
        $meets = meet::where('start', '>=', date('Y-m-d'))->get();

        foreach ($meets as $meet) {
            $_array[] = array(
                'id' => $meet->id,
                'start' => Carbon::parse($meet->start)->format('Y-m-d'),
                'end'   =>  '',
                'title' =>  $meet->start->format('H:i') . ' - ' . $meet->reason->reason,
                'url'   =>  '/meets/' . $meet->id,
                'color' =>  $meet->user->color,
            );
        }

        foreach ($eventos as $evento) {
            $_array[] = array(
                'id' => $evento->id,
                'start' => Carbon::parse($evento->start)->format('Y-m-d'),
                'end'   =>  Carbon::parse($evento->end)->format('Y-m-d'),
                'title' =>  $evento->subtitle . ' - ' . $evento->cliente->nombre,
                'url'   =>  '/eventos/' . $evento->id,
                'color' =>  $evento->color,
            );
        }


        return response()->json($_array);
        //Pasamos los argumentos json

        //$events = evento::get(['title','start','end']);
        //return response()->json(['events' => $events]);
    }

    /**Generamos el contrato y lo almacenamos en /storage/contratos/id_cliente-id_eventos-fecha */
    public function contrato(evento $evento)
    {
        /* this date is for name */
        $today = Carbon::now()->format('d_m_Y');
        $slugName = str::slug($evento->cliente->nombre, '_');

        /**Validamos que el evento ya cuente con un pago de anticipo */
        $anticipo = DB::table('pagos')
            ->where('tipo', '=', 'anticipo')
            ->where('monto', '>=', '15000')
            ->where('evento_id', '=', $evento->id)->get();

        $anticipo = json_decode($anticipo, true);

        /* Agregamos los servicios de este evento */
        $servicios = $this->serviciosTrait($evento);

        if (count($anticipo) >= 1) {
            //dd($anticipo['0']['anticipo']['monto'])

            /* format the date */
            $fechaInicio = $this->formatearFecha($evento->start,true);
            $fechaFin = $this->formatearFecha($evento->end,true);
            $hours = $evento->start->diffInHours($evento->end);
            $fechaActual = $this->formatearFecha(Carbon::now());

            /* EXIST SERVICEs */
            /* if exist return service, else 0 */
            $decor = $this->decoracionExistTrait($evento);

            /* Generate the object to pass to the view  */
            $servicesExist = new stdClass();
            $servicesExist->decor = $decor;

            $fechaEventoManana = Carbon::parse($evento->start);
            $fechaEventoManana  = $fechaEventoManana->addDay();
            $fechaEventoManana = Carbon::parse($fechaEventoManana)->translatedFormat('l j \d\e F \d\e Y');


            /**Seis meses antes */
            $fecha6meses = Carbon::parse($evento->start);
            $fecha6meses = $fecha6meses->subMonth(6);
            $fecha6meses = $this->formatearFecha($fecha6meses);
            /**Tres meses antes */
            $fecha3meses = Carbon::parse($evento->start);
            $fecha3meses = $fecha3meses->subMonth(3);
            $fecha3meses = $this->formatearFecha($fecha3meses);
            /**Un mes antes */
            $fecha1mes = Carbon::parse($evento->start);
            $fecha1mes = $fecha1mes->subMonth(1);
            $fecha1mes = $this->formatearFecha($fecha1mes);
            /**un día antes */
            $fecha1diaantes = Carbon::parse($evento->start);
            $fecha1diaantes = $fecha1diaantes->subDay(1);
            $fecha1diaantes = $this->formatearFecha($fecha1diaantes);
            /**cinco dias antes */
            $fecha5diasantes = Carbon::parse($evento->start);
            $fecha5diasantes = $fecha5diasantes->subDay(5);
            $fecha5diasantes = $this->formatearFecha($fecha5diasantes);

            /**7 dias antess */
            $fecha7diasantes = Carbon::parse($evento->start);
            $fecha7diasantes = $fecha7diasantes->subDay(7);
            $fecha7diasantes = $this->formatearFecha($fecha7diasantes);
            /**15 dias antess */
            $fecha15diasantes = Carbon::parse($evento->start);
            $fecha15diasantes = $fecha15diasantes->subDay(15);
            $fecha15diasantes = $this->formatearFecha($fecha15diasantes);

            /**Evento */
            $invitadosLetra = NumerosALetras::convertir($evento->invitados, '', false, '');

            /***Costo en texto */
            $costo = $this->costoEvento($evento);
            $costoTexto = NumerosALetras::convertir($costo, 'Pesos', false, 'Centavos');
            $valores = new stdClass();
            $valores->costo = $costo;
            $valores->costoTexto = $costoTexto;
            $valores->costoAnticipo = $anticipo[0]['monto'];
            $valores->costoAnticipoTexto = NumerosALetras::convertir($evento->costoAnticipo, 'Pesos', false, 'Centavos');



            /**Es necesario pasar los valores que se necesitan
             * FECHA DE GENERACION: 03 días del mes de Julio del año 2022
             * INVITADOS: Cantidad de invitados
             * FECHA EVENTO: Cuando inicia el evento 13 de mayo a las 21 horas
             * FECHA TERMINO: Cuando termina el evento 14 de mayo a las 2
             * MONTO: Monto del evento
             * MONTO LETRA: Monto del evento en letra
             * MONTO INICIAL: es el 10% del monto total del evento
             * FECHA 6 MESES ANTES DEL EVENTO:
             * FECHA 1 MES ANTES.
             * FECHA 15 DÍAS ANTES
             * DIA ANTES DEL EVENTO
             *
             **/
            /**Creamos nuestro objeto para pasar los valores por el mismo  */
            /* genarate the object to pass to the view */
            $fecha = new stdClass();
            $fechas = new stdClass();
            $fechas->fechaInicio = $fechaInicio;
            $fechas->fechaFin = $fechaFin;
            $fechas->hours = $hours;
            $fecha->fechaActual = $fechaActual;
            $fecha->fechaEventoManana = $fechaEventoManana;
            $fecha->fecha6meses = $fecha6meses;
            $fecha->fecha1mes = $fecha1mes;
            $fecha->fecha1diaantes = $fecha1diaantes;
            $fecha->fecha5diasantes = $fecha5diasantes;
            $fecha->fecha7diasantes = $fecha7diasantes;
            $fecha->fecha15diasantes = $fecha15diasantes;
            $fecha->fecha3meses = $fecha3meses;


            $valores->invitadosLetra = $invitadosLetra;

            /* !empty($evento->cliente?->email)
            Trabaja verificando si la relación existe y aparte
            que la propiedad no sea vacia. */
            // if (isEmpty($evento->contract) && !empty($evento->cliente?->email)) {
                /* Procedemos a mandar el correo  */
                /* $cliente = cliente::find($evento->cliente_id);
                $cliente->notify(new contractInformation());
                $evento->contract = Carbon::now()->format('Y-m-d H:i:s');
                $evento->save();
            } */

            /* Servicios de paga */

            /**Validamos si tiene o no anticipo, si es que tiene imprime el contrato
             * de lo contrario no
             * si el registro nos regresa uno quiere decir que si tiene anticipo.
             */
            $name = $evento->id . '_' . $slugName . '_' . $today . '_contrato.pdf';
            if ($evento->title == "Social") {
                $pdf = PDF::loadView('/eventos/contrato', compact('evento', 'fecha', 'fechas', 'servicios', 'servicesExist','valores'));
            } else {
                $pdf = PDF::loadView('/eventos/contratoEmpresa', compact('evento', 'fechas', 'fecha',  'servicios', 'servicesExist','valores'));
            }

            /* storage pdf */
            $content = $pdf->download()->getOriginalContent();
            $save = Storage::disk('local')->put('contracts' . '/' . $name, $content);

            /* storage pdf  verifiar si es neesario guardar ese nombre*/
            /* $save == true ? $evento->contract = $name : null;
            $evento->save(); */


            return $pdf->setPaper('a4')->stream($name);
            -/* >setPaper('letter')
                ->stream($name) */
            /* ->download()->getOriginalContent() *

            Storage::disk('local')->put('contratos' . '/' . $name, $pdf);

            $eventoUpdate = evento::find($evento->id)->first();

            /* guardamos el nombre del contrato  */
            /*  $registro = $eventoUpdate->update([
                'contrat'  =>  $name,
            ]); */
            /* Actualizamos el checklist */
            /* $eventoUpdate->Checklist->update([
                'contrato'  =>  true,
            ]); */flash('Contrato generado');
            return back();
        } else {
            return back();
        }
    }

    public function pago(Evento $evento)
    {
        $CostoEvento = $this->costoEvento($evento);
        $pagado = $evento->pagos()->sum('monto');
        $cuentas = cuenta::all();

        return view('pagos.index')
            ->with('evento', $evento)
            ->with('cuentas', $cuentas)
            ->with('costoEvento', $CostoEvento)
            ->with('pagado', $pagado);
    }

    public function layout(Request $request, evento $evento)
    {
        /* Validamos que se envio un archivo */
        $request->validate([
            'layout'    =>  'required',
        ]);
        /* Si existe el archivo lo eliminamos */
        if (!empty($evento->layout)) {
            Storage::delete($evento->layout);
        }
        /* Guardamos la imagen nueva y obtenermos el nombre  */
        $path = $request->layout->store('layouts');

        /* Actualizamos nuestro registro */
        $evento->update([
            'layout'    =>  $path,
        ]);

        return back();
    }

    function convertirNumeroATexto($number)
    {
        $f = new \NumberFormatter("es", \NumberFormatter::SPELLOUT);
        return $f->format($number);
    }

    /**
     * Convierte una fecha al formato deseado.
     *
     * @param string $fecha
     * @return string
     */
    public function formatearFecha($fecha, $incluirHora = false)
    {
        // Crear una instancia de Carbon a partir de la fecha
        $carbonFecha = Carbon::parse($fecha);

        // Obtener las partes de la fecha en formato numérico
        $diaNumero = $carbonFecha->day;
        $mesNombre = $carbonFecha->translatedFormat('F'); // Nombre del mes en español
        $anioNumero = $carbonFecha->year;

        // Convertir las partes de la fecha en texto
        $diaTexto = $this->convertirNumeroATexto($diaNumero);
        $anioTexto = $this->convertirNumeroATexto($anioNumero);

        // Construir el formato con o sin hora
        if ($incluirHora) {
            // Formatear la hora y convertirla a texto
            $hora = $carbonFecha->format('H:i');
            $horaTexto = $this->convertirNumeroATexto($carbonFecha->hour) . " horas";
            return "{$hora} horas del {$carbonFecha->day} de {$mesNombre} del {$carbonFecha->year} ({$horaTexto} del {$diaTexto} de {$mesNombre} del {$anioTexto})";
        }

        // Formato sin hora
        return "{$carbonFecha->day} de {$mesNombre} del {$carbonFecha->year} ({$diaTexto} de {$mesNombre} del {$anioTexto})";
    }

}
