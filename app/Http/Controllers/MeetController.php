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

        $user = auth()->user();

        // Si es administrador, obtener todos los usuarios
        if ($user->hasRole('Administrador')) {
            $sellers = User::orderby('name')->get();
        } else {
            // Si no es administrador, obtener solo usuarios con el mismo rol
            $userRoles = $user->roles->pluck('id');
            $sellers = User::whereHas('roles', function($query) use ($userRoles) {
                $query->whereIn('roles.id', $userRoles);
            })->orderby('name')->get();
        }

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

        flasher('Se ha creado la reunión correctamente');
        return back();
    }

    public function show(meet $meet)
    {
       return view('meets.show', compact('meet'));
    }

    public function update(Request $request, meet $meet)
    {

        $this->validate($request, [
            'resultado' => 'required|in:contrato,no_contrato,realizada,no_realizada',
            'observacion' => 'required',
        ]);

        $meet->update([
            'resultado' => $request['resultado'],
            'observacion' => $request['observacion'],
        ]);
        flasher('Se ha actualizado el meet');
        return back();
    }
}
