<?php

namespace App\Http\Controllers;

use App\NumerosALetras;
use App\pago;
use App\evento;
use App\cliente;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Fluent;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Traits\EventoTrait;

class PagoController extends Controller
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
        /* Formar date */

        /* Información del evento  */
        $evento = evento::find($request['evento']);
        /* Monto restante */
        $pendiente = $this->diferenciaEvento($evento);
        $pendienteText = NumerosALetras::convertir($this->diferenciaEvento($evento));

        $today = Carbon::now()->format('d_m_Y');
        $now = Carbon::now()->format('d-m-Y');
        $nowText = $this->formatearFecha($now);

        /* Información de cliente */
        $cliente = cliente::find($request['cliente'])->pluck('nombre')->first();
        $clienteSlug = Str::slug($cliente);
        /* Información del usuario  */
        $user = Auth::user()->pluck('name')->first();
        /* Monto */
        $monto = $request['monto'];
        $montoTexto= NumerosALetras::convertir($request['monto'],'',false,'');
        /* Name */
        $name = $clienteSlug . '_' .$today . '.pdf';
        /* Generación de pdf */
        $pdf = PDF::loadView('/pagos/recibo',compact('cliente','user','evento','nowText','monto', 'montoTexto', 'pendiente','pendienteText'));
        $result =  $pdf->setPaper('a5','landscape')->stream($name);

        $content = $pdf->download()->getOriginalContent();
        $save = Storage::disk('local')->put('receipts'. '/' . $name, $content);
        return $result;
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
