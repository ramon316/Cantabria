<?php

namespace App\Http\Livewire;
use App\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsuariosIndex extends Component
{
    use WithPagination;
    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
/*         $Usuarios = User::where([
                ['name', 'like', "%$this->search%"],
                ['id', '<>', auth()->user()->id]
            ])
            ->paginate(10); */
/* 
        Aqui usamo el wher funtion, nos permite hacer varias consultas de ya resultados obtenidos
        $Usuarios = User::where(function ($query){
                $query->where('id', '<>', auth()->user()->id)
                ->where('name', 'like', "%$this->search%");
            })->Where(function($query){
                $query->orWhere('email', 'like', "%$this->search%");
            })
            ->paginate(10); */

            /* Probamos otro wuery function */
            $usuarios = User::where('id','!=', auth()->user()->id)
                        ->where( function ($query){
                                $query->orWhere('name', 'like', "%$this->search%")
                                        ->orWhere('email', 'like', "%$this->search%");
                        })->paginate(10);

        return view('livewire.usuarios-index')->with('usuarios', $usuarios);
    }
}
