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
        $cotizaciones = cotizacion::join('clientes','clientes.id', '=', 'cotizacions.cliente_id')
        ->select('clientes.nombre', 'cotizacions.title', 'cotizacions.start', 'cotizacions.created_at', 'cotizacions.id','cotizacions.user_id', 'cotizacions.validez')
        ->where('clientes.nombre', 'LIKE', "%$this->search%")
        ->where('cotizacions.user_id', '=', Auth()->user()->id)
        ->orderBy('cotizacions.created_at','desc')
        ->paginate(10);

        $this->hoy = Carbon::now();
        

        return view('livewire.cotizacion-index')->with('cotizaciones', $cotizaciones)->with('hoy', $this->hoy);
    }
}
