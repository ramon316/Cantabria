<?php

namespace App\Http\Controllers;

use App\Banquet;
use App\evento;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

use App\Traits\EventoTrait;

use App\Traits\EventoTrait;

class BanquetController extends Controller
{
    use EventoTrait;
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
        /* Obtener el  */
        $banquet = $this->banquetExistTrait($evento);
<<<<<<< HEAD
        /* dd($banquet); */
=======
>>>>>>> 75417a40b202df7ed5734fcdea04d45711533b38

        if ($banquet == true) {
            $cantidad = $this->banquetEvento($evento);
        }
        return view('banquets.create')
        ->with('evento',$evento)
        ->with('banquet',$banquet)
        ->with('cantidad',$cantidad);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banquet  $banquet
     * @return \Illuminate\Http\Response
     */
    public function show(Banquet $banquet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banquet  $banquet
     * @return \Illuminate\Http\Response
     */
    public function edit(Banquet $banquet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banquet  $banquet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banquet $banquet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banquet  $banquet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banquet $banquet)
    {
        //
    }

    public function formato(evento $evento){
        $banquet = $evento->banquet()->first();
        $fechaEvent = Carbon::parse($evento->start);;

        $pdf = PDF::loadView('banquets.format',compact('evento','banquet','fechaEvent'));
        return $pdf->setPaper(array(0, 0, 528, 410))->stream('formato.pdf');
    }
}
