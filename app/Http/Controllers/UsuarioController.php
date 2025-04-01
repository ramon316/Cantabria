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
        $usuarios = User::where('id', '<>', auth()->user()->id)->get();
        return view('usuarios.index')->with('usuarios', $usuarios);
    }

    public function create(){
        $allRolesInDatabase = Role::all()->pluck('name');
        return view('usuarios.create', compact('allRolesInDatabase'));
    }

    public function store(Request $request){
        $user = $request->validate([
            'name'      =>  'required|unique:users,name',
            'email'     =>  'email | unique:users,email',
            'password'  =>  'required |min:8',
            'ConfirmacionPassword' =>  'required|same:password',
            'Rol'     =>  'required',
        ]);

        User::create([
            'name'      =>  $user['name'],
            'email'     =>  $user['email'],
            'password'  =>  Hash::make($user['password']),
            'color'     =>  $request->color,
        ])->assignRole($user['Rol']);


        flasher('Se ha creado el usuario');

        return redirect()->route('usuarios.index');

    }

    public function edit(User $usuario)
    {
        /* Obtenemos los roles */
        $allRolesInDatabase = Role::all()->pluck('name');
        return view('usuarios.edit', compact('usuario','allRolesInDatabase'));
    }

    public function update(Request $request, User $usuario)
    {
        $data = $request->validate([
            'name'      =>  'required|unique:users,name,'. $usuario->id,
            'email'     =>  'email | unique:users,email,'. $usuario->id,
            'role'     =>  'required',
            'color'     =>  'required',
        ]);

        $usuario->update($data);

        $usuario->syncRoles($data['role']);

        flasher('Se ha actualizado el usuario');

        return redirect()->route('usuarios.edit', $usuario);
    }

    public function destroy(User $usuario)
    {
        $usuario->delete();
        flasher('Se ha eliminado el usuario');
        return redirect()->route('usuarios.index');
    }
}
