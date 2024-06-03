<?php

namespace App\Http\Controllers;

use App\Precio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrecioController extends Controller
{
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
        //mostramos la lista de los precios
        $precios = DB::table('precios')->paginate(6);
        
        return view('precios.index')->with('precios',$precios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('precios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Aquí vamos a validar los precios 
        $data = $request->validate([
            'invitados' =>'required|numeric|min:200|max:800',
            'renta'     => 'required|integer',
            'decoracion'    => 'required|integer',
            'dulces'        => 'required|integer',
            'postres'       => 'required|integer', 
            'bebidas'       => 'required|integer',
            'pastel'        => 'required|integer',
            'meseros'       => 'required|integer',
            'dias'          => 'required',
            'año'           =>  'required',
        ]);
        
        DB::table('precios')->insert([
            'invitados' => $data['invitados'],
            'renta'     => $data['renta'],
            'decoracion'    => $data['decoracion'],
            'dulces'        => $data['dulces'],
            'postres'       => $data['postres'], 
            'bebidas'       => $data['bebidas'],
            'pastel'        => $data['pastel'],
            'meseros'       => $data['meseros'],
            'dias'          => $data['dias'],
            'año'           => $data['año'],
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
        ]);
        return redirect()->route('precios.index');
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
    public function edit(Precio $precio)
    {
        //
        return view('precios.edit')->with('precio',$precio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Precio $precio)
    {
        //dd($precio);

        //Validamos
        //Aquí vamos a validar los precios 
        $this->validate($request,[
            'invitados'     =>  'required|numeric|min:200|max:800',
            'renta'         =>  'required|integer',
            'decoracion'    =>  'required|integer',
            'dulces'        =>  'required|integer',
            'postres'       => 'required|integer', 
            'bebidas'       => 'required|integer',
            'pastel'        => 'required|integer',
            'meseros'       => 'required|integer',
            'dias'          => 'required',
        ]);
       

        /**Sobreescribimos la información */
        $precio->update([
            'precio'    => $request->precio,
            'renta'     => $request->renta,
            'decoracion'    =>  $request->decoracion,
            'dulces'        =>  $request->dulces,
            'postres'       =>  $request->postres,
            'bebidas'       =>  $request->bebidas,
            'pastel'        =>  $request->pastel,
            'meseros'       =>  $request->meseros,
            'dias'      =>  $request->dias,
        ]);

        /**guardasmos la informacion */
        /* $precio->save(); */
        /**Redireccionamos */
        return redirect()->route('precios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Precio $precio)
    {
        //Mandamos llamar al metodo delete
        $precio->delete();
        /**Redireccionamos a nuestra pagina inciial  */
        //return redirect()->route('precios.index');

    }
}
