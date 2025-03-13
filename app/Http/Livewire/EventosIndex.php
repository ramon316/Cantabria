<?php

namespace App\Http\Livewire;

use App\evento;
use App\cliente;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class EventosIndex extends Component
{

    use WithPagination;
    public $search;
    public $inicio;
    public $fin;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        if (Auth::user()->hasRole('Banquete')) {
            if ($this->inicio <> "") {
                if ($this->fin == "") {
                    $eventos = evento::query()
                        ->join('clientes', 'eventos.cliente_id', '=', 'clientes.id')
                        ->join('evento_servicio', 'eventos.id', '=', 'evento_servicio.evento_id')
                        ->join('servicios', 'evento_servicio.servicio_id', '=', 'servicios.id')
                        ->where('servicios.nombre', 'like', '%banquete%')
                        ->where('clientes.nombre', 'like', "%$this->search%")
                        ->select('eventos.*', 'clientes.nombre as nombre')
                        ->distinct()
                        ->paginate(10);
                } else {
                    $eventos = evento::query()
                        ->join('clientes', 'eventos.cliente_id', '=', 'clientes.id')
                        ->join('evento_servicio', 'eventos.id', '=', 'evento_servicio.evento_id')
                        ->join('servicios', 'evento_servicio.servicio_id', '=', 'servicios.id')
                        ->where('servicios.nombre', 'like', '%banquete%')
                        ->where('start', ">=", $this->inicio)
                        ->where('start', "<=", $this->fin)
                        ->where('clientes.nombre', 'like', "%$this->search%")
                        ->select('eventos.*', 'clientes.nombre as nombre')
                        ->distinct()
                        ->paginate(10);
                }
            } else {
                $eventos = evento::query()
                    ->join('clientes', 'eventos.cliente_id', '=', 'clientes.id')
                    ->join('evento_servicio', 'eventos.id', '=', 'evento_servicio.evento_id')
                    ->join('servicios', 'evento_servicio.servicio_id', '=', 'servicios.id')
                    ->where('servicios.nombre', 'like', '%banquete%')
                    ->where('clientes.nombre', 'like', "%$this->search%")
                    ->select('eventos.*', 'clientes.nombre as nombre')
                    ->distinct()
                    ->paginate(10);
            }
        } else {
            if ($this->inicio <> "") {
                if ($this->fin == "") {
                    $eventos = cliente::join('eventos', 'eventos.cliente_id', '=', 'clientes.id')
                        ->select('*')
                        ->where('nombre', 'LIKE', "%$this->search%")
                        ->paginate(10);
                } else {
                    $eventos = cliente::join('eventos', 'eventos.cliente_id', '=', 'clientes.id')
                        ->select('*')
                        ->where('nombre', 'LIKE', "%$this->search%")
                        ->where('start', ">=", $this->inicio)
                        ->where('start', "<=", $this->fin)
                        ->paginate(10);
                }
            } else {
                $eventos = cliente::join('eventos', 'eventos.cliente_id', '=', 'clientes.id')
                    ->select('*')
                    ->where('nombre', 'LIKE', "%$this->search%")
                    ->paginate(10);
            }
        }


        return view('livewire.eventos-index')->with('eventos', $eventos);
    }
}
