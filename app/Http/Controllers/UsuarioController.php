<?php

namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsuarioController extends Controller
{
    private $mensaje='';
    private $estilo='';

    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index(){
        /* Usuarios con roles */
        $usuarios = User::all();
        $usuarios = User::where('id', '<>', auth()->user()->id)->get();
        return view('usuarios.index')->with('usuarios', $usuarios);
    }

    public function create(){
        return view('usuarios.create');
    }

    public function store(Request $request){
        $usuario = $request->validate([
            'name'      =>  'required|unique:users,name',
            'email'     =>  'email | unique:users,email',
            'password'  =>  'required |min:8',
            'ConfirmacionPassword' =>  'required|same:password',
        ]);

        User::create([
            'name'=>$usuario['name'],
            'email'=>$usuario['email'],
            'password'=>Hash::make($usuario['password']),
        ]);

        flasher('Se ha creado el usuario');
        return back();

    }

    public function edit(User $usuario)
    {
        /* Obtenemos los roles */
        $roles = Role::all();
        return view('usuarios.edit')->with('usuario',$usuario)->with('roles', $roles);
    }

    public function update(Request $request, User $usuario)
    {
        //dd($request->role);
        $usuario->roles()->sync($request->roles);
        $this->mensaje = 'Se asignaron los roles satisfactoriamente';
        $this->estilo = 'alert-primary';
        flasher('Se actualizo el usuario correctamente');
        return back();
    }
}
