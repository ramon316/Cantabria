<?php

namespace App\Http\Controllers;

use App\cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Spatie\Permission\Contracts\Role;

class ClienteController extends Controller
{
    use WithPagination;

    public function __construct()
    {
        $this->middleware('auth');
/*         $this->middleware('can:cliente.index')->only('index');
        $this->middleware('can:clientes.create')->only('create', 'store'); */
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //retornamos la vista clientes index
        //DB::table('clientes')->get()->dd();
        $clientes = cliente::paginate();
        return view('clientes.index')->with('clientes',$clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        //Primero validamos
        $data = $request->validate([
            'nombre'=> 'required|unique:clientes,nombre',
            'telefono'=> 'required|digits:10',
        ]);
        /**Cambiamos el nombre a nombre propio */
        $nombre = ucwords(strtolower($data['nombre']));

        /**guardamos la información en nuestra tabla clientes */
        DB::table('clientes')->insert([
            'nombre'=>$nombre,
            'telefono'=>$data['telefono'],
            'email'=>$request['email'],
            'calle' => $request['calle'],
            'numero' =>$request['numero'],
            'colonia' =>$request['colonia'],
            'cp' => $request['cp'],
            'user_id'=>Auth::user()->id,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);

        /* Mostramos la alerta */
        flash()->addSuccess('Se agrego el cliente.');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(cliente $cliente)
    {
        //
        return view('clientes.edit')->with('cliente',$cliente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cliente $cliente)
    {

        //Esto es cuando modificamos los valores que se editan

        /**Igualamos el request en data */
        $data = $request->validate([
            'nombre'=> 'required',
            'telefono'=> 'required',
            'email'=>'email|required',
        ]);

         /**Cambiamos el nombre a nombre propio */
         $nombre = ucwords(strtolower($data['nombre']));

        /**Rescribir la iformación */
        $cliente->nombre = $nombre;
        $cliente->telefono = $data['telefono'];
        $cliente->email = $data['email'];
        $cliente->calle = $request['calle'];
        $cliente->numero = $request['numero'];
        $cliente->colonia = $request['colonia'];
        $cliente->cp = $request['cp'];

        /**Guardamos la información */
        $cliente->save();

        flasher('Se actualizaron los datos del cliente');

        /**Redireccionamos */
        return back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(cliente $cliente)
    {
        //Eliminamos el resgistro
        $cliente->delete();
        /**Redireccionamos */
        return redirect()->route('clientes.index');
    }
}
