<?php

namespace App\Http\Livewire;

use App\cliente;
use App\evento;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

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




        return view('livewire.eventos-index')->with('eventos', $eventos);
    }
}
