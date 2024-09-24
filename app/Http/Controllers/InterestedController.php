<?php

namespace App\Http\Controllers;

use App\interested;
use Illuminate\Http\Request;

class InterestedController extends Controller
{

    public function store(Request $request){

       $this->validate($request,[
            'name' => 'required',
            'email' =>  'required|email',
            'phone' =>  'required|numeric|digits:10',
            'message'   =>  'required|min:5',
        ],
        [
            'name.required' =>  'El nombre es necesario',
            'email.required'    =>  'El correo electrónico es necesario',
            'phone.required'    =>  'El telefono es necesario',
            'message.required'  =>  'Tienes que agregar un mensaje'
        ]);

        $interested = interested::create([
            'name' => $request['name'],
            'email' =>  $request['email'],
            'phone' =>  $request['phone'],
            'message'   => $request['message'],
        ]);


        /* Vamos a generar una retraso en el envio de nuestro correo es solo purbas */
       /*  $delay = now()->addSeconds(10);
        $interested->notify((new MessageInfo)->delay([
            'mail' =>   $delay,
            'database'  =>  $delay,
        ])); */

        /* Aqui solo mandamos la información del interesado al correo para que este la reciba */
        /* Estamos eliminando esto por que lo envia al interesado y no se como cambiarlo */
        //$interested->notify(new MessageInfo($interested));

        /* Esto es un envio inmediato */
       /*  $interested->notify(new MessageInfo()); */

        /* opcion dos utilizando el facade de notification este nos permite enviar a varios interesados o usuarios.*/
       /*  Notification::send(User::all(), new MessageInfo()); */

            flasher('Su comentario ha sido enviado');

        return back();
    }

    /* public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    } */
}
