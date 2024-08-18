<?php

namespace App\Http\Controllers;

use App\cliente;
use App\meet;
use App\User;
use Illuminate\Http\Request;
use App\reason;

class MeetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('meets.index');
    }

    public function create()
    {
        $reasons = reason::orderby('reason')->get();
        $sellers = User::role('Usuario')->get();
        $clients = cliente::orderby('nombre')->get();
        return view('meets.create', compact('sellers', 'clients', 'reasons'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'seller' => 'required',
            'client' => 'required',
            'reason' => 'required',
            'date' => 'required',
        ], [
            'seller.required' => 'Debe seleccionar al vendedor',
            'client.required' => 'Debe seleccionar al cliente',
            'date.required' => 'Debe seleccionar la fecha y hora',
            'reason.required' => 'Debe seleccionar el motivo',
        ]);

        $user = User::find($request['seller']);
        

        $newMeet = meet::create([
            'user_id' => $request['seller'],
            'cliente_id' => $request['client'],
            'start' => $request['date'],
            'reason_id' => $request['reason'],
            'title' => $user->name,
        ]);

        flasher('Se ha creado el meet');
        return back();
    }

    public function show(meet $meet)
    {
        ds($meet);
       return view('meets.show', compact('meet'));
    }

    public function update(Request $request, meet $meet)
    {
        
        $this->validate($request, [
            'contrato' => 'required',
            'observacion' => 'required',
        ]);

        $meet->update([
            'contrato' => $request['contrato'],
            'observacion' => $request['observacion'],
        ]);
        flasher('Se ha actualizado el meet');
        return back();
    }
}
