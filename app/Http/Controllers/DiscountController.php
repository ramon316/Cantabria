<?php

namespace App\Http\Controllers;

use App\Discount;
use App\evento;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(evento $evento)
    {
        $discount = $evento->discount;

        return view('discounts.create')->with('discount', $discount)->with('evento', $evento);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'amount'    =>  'required|numeric|max:10000|min:1',
            ],
            [
                'required'  =>  'El campo descuento es obligatorio',
                'max'   =>  'El monto máximo de descuento es $10,000.00 pesos',
            ],
        );

        $discont = Discount::create([
            'evento_id' =>  $request->evento,
            'amount'    =>  $request->amount,
        ]);

        flasher('El descuento se ha agregado.');

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $discount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discount $discount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discount $discount)
    {
        $discount->delete();
        flasher('El descuento se elimino correctamente','error');
        return back();
    }
}
