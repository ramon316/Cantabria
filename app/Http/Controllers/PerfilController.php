<?php

namespace App\Http\Controllers;

use App\Perfil;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    private $mensaje='';
    private $estilo = '';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Auth()->user();

        return view('perfils.index')->with('usuario',$usuario);

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        //


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        $perfil =  Auth::user()->perfil;
        return view('perfils.edit')->with('perfil',$perfil);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {

        /* get the user */
        $user = Auth::user();
        $perfil = $user->perfil;

        $this->validate($request,[
            'nombre'    => ['required','min:8','unique:users,name,'. auth()->user()->id,],
            'telefono'  =>  'nullable|string|max:10|unique:perfils,telefono,' . auth()->user()->id,
            'imagen'    =>  'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->has('nombre')) {
            $user->name = $request->nombre;
        }

        if ($request->has('telefono')) {
           $perfil->telefono = $request->telefono;
        }

        if ($request->has('imagen')) {
            /* Verificamos si tiene imagen  */
           if (!empty($perfil->imagen)) {
            Storage::delete($perfil->imagen);
           }
           $path = $request->imagen->store('perfils');
           $perfil->imagen = $path;
        }

        if ($perfil->isDirty()) {
            $perfil->save();
        }

        if ($user->isDirty()) {
            $user->save();
        }

        flash('Se actualizo el perfil');
        return back();
        //Esto es cuando modificamos los valores que se editan


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        //
    }
}
