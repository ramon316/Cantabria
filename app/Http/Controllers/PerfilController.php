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
        /* dd($request->all()); */
        /**Validamos la información
         * En el nombre estamos que sea unico pero que no sea el mismo que editamos
        */

        $this->validate($request,[
            'nombre'    => ['required','min:8','unique:users,name,'. auth()->user()->id,],
            'telefono'  =>  'numeric|digits:10',
            'imagen'    =>  'required|image|max:2048',
        ]);

        /* Eliminamos la imagen si existe*/
        if (!empty($perfil->imagen)) {
            Storage::delete($perfil->imagen);
        }
        /* dd(env('APP_ENV')); */
        /* Guardamos los datos  */
        $path = $request->imagen->store('upload-perfiles');
       /*  dd($path); */
        $perfil->update([
            'imagen' => $path,
            'telefono' => $request->telefono
        ]);

        /*Realizamos la lógica para manipular la imagen*/

        /* if ($request->imagen) {
            $imagen = $request->file('imagen');
            $nombreImagen = Str::uuid() . "." . $imagen->extension();
            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(300,300);
            $imagenPath = public_path('upload-perfiles') . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);

            if ($perfil->imagen <> null) {
                unlink( public_path('upload-perfiles'). '/'. $perfil->imagen);
            }
        } */
        /* Buscamos a nuestro usuario  y lo modificamos*/
        /* $user = User::find(auth()->user()->id);
        $user->name = $request->nombre;
        $user->save();
 */
        /* Guardamos la información, si no existe el request de l aimagen lo dejamos con la anterior o vacio*/
       /*  $perfil->telefono = $request->telefono;
        $perfil->imagen = $nombreImagen ?? Auth::user()->perfil->imagen ?? '';
        $perfil->save(); */


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
