<?php

namespace App\Http\Livewire;

use App\cotizacion;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class CotizacionIndex extends Component
{
    use WithPagination;
    public $search;

    public $hoy;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $query = cotizacion::join('clientes','clientes.id', '=', 'cotizacions.cliente_id')
        ->join('users', 'users.id', '=', 'cotizacions.user_id')
        ->select(
            'cotizacions.*',
            'clientes.nombre',
            'users.name as usuario_nombre'
        )
        ->where('clientes.nombre', 'LIKE', "%$this->search%");

        // Si el usuario no es administrador, filtrar solo sus cotizaciones
        if (!auth()->user()->hasRole('Administrador')) {
            $query->where('cotizacions.user_id', '=', Auth()->user()->id);
        }

        $cotizaciones = $query->orderBy('cotizacions.created_at','desc')
        ->paginate(10);

        $this->hoy = Carbon::now();


        return view('livewire.cotizacion-index')->with('cotizaciones', $cotizaciones)->with('hoy', $this->hoy);
    }
}
