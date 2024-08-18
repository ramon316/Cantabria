<?php

namespace App\Http\Livewire;

use App\meet;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class CreateMeet extends Component
{
    use WithPagination;
    public $search;
    public $inicio;
    public $fin;
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {

    }

    public function render()
    {
        
        if ($this->inicio <> "" && $this->fin <> "") {
        
            if (Auth::user()->hasRole('Administrador')) {
                /* this returns all meets */
                $meets = meet::join('clientes', 'clientes.id', '=', 'meets.cliente_id')
                    ->select('clientes.nombre', 'meets.title', 'meets.start', 'meets.created_at', 'meets.id', 'meets.user_id', 'meets.contrato', 'reason_id')
                    ->where('meets.start', ">=", $this->inicio)
                    ->where('meets.start', "<=", $this->fin)
                    ->where('clientes.nombre', 'LIKE', "%$this->search%")
                    ->where('meets.start', '>=', Carbon::now())
                    ->orderBy('meets.start', 'asc')
                    ->paginate(10);
            } else {
                /* this only his own meets */
                $meets = meet::join('clientes', 'clientes.id', '=', 'meets.cliente_id')
                    ->select('clientes.nombre', 'meets.title', 'meets.start', 'meets.created_at', 'meets.id', 'meets.user_id', 'meets.contrato', 'reason_id')
                    ->where('meets.start', ">=", $this->inicio)
                    ->where('meets.start', "<=", $this->fin)
                    ->where('clientes.nombre', 'LIKE', "%$this->search%")
                    ->where('meets.start', '>=', Carbon::now())
                    ->where('meets.user_id', '=', Auth()->user()->id)
                    ->orderBy('meets.start', 'asc')
                    ->paginate(10);
            }
        }
        else {
            if (Auth::user()->hasRole('Administrador')) {
                /* this returns all meets */
                $meets = meet::join('clientes', 'clientes.id', '=', 'meets.cliente_id')
                    ->select('clientes.nombre', 'meets.title', 'meets.start', 'meets.created_at', 'meets.id', 'meets.user_id', 'meets.contrato', 'reason_id')
                    ->where('clientes.nombre', 'LIKE', "%$this->search%")
                    ->where('meets.start', '>=', Carbon::now())
                    ->orderBy('meets.start', 'asc')
                    ->paginate(10);

            } else {
                /* this only his own meets */
                $meets = meet::join('clientes', 'clientes.id', '=', 'meets.cliente_id')
                    ->select('clientes.nombre', 'meets.title', 'meets.start', 'meets.created_at', 'meets.id', 'meets.user_id', 'meets.contrato', 'reason_id')
                    ->where('clientes.nombre', 'LIKE', "%$this->search%")
                    ->where('meets.user_id', '=', Auth()->user()->id)
                    ->where('meets.start', '>=', Carbon::now())
                    ->orderBy('meets.start', 'asc')
                    ->paginate(10);
            }
        }      

        return view('livewire.create-meet')->with('meets', $meets);
    }
}
