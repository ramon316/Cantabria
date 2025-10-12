<?php

namespace App\Http\Livewire;

use App\servicio;
use App\Discount;
use App\Traits\CotizacionTrait;
use Livewire\Component;
use Livewire\WithPagination;

class QuoterCreate extends Component
{
    use CotizacionTrait;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    /* Variables */
    public $cotizacion;
    public $search = '';
    public $servicioName = '';
    public $servicioId = '';
    public $count = 1;
    public $gift;
    public $descuento = 0;

    protected $listeners = ['render'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function Addservice(servicio $servicio)
    {
       $this->servicioName = $servicio->nombre;
       $this->servicioId = $servicio->id;
    }

    public function deleteService($id)
    {
        $this->cotizacion->servicio()->detach($id);
        $this->emit('render');
    }

    public function close()
    {
        $this->dispatchBrowserEvent('closeModal');
        $this->servicioName = '';
    }

    public function save($value, $id)
    {
        /* Verify the value of $gift not empty */
        if ($this->gift == "") {
            $this->gift = 0;
        }

        $service = servicio::find($id);
        $this->cotizacion->servicio()->attach($service->id, ['cantidad' => $value, 'costo' => $service->costo, 'regalo' => $this->gift]);
        $this->emit('render');
        /* Cerramos el modal */
        $this->dispatchBrowserEvent('closeModal');
        /* Reset the properties of modal */
        $this->servicioName = '';
        $this->count = 1;
    }

    public function saveDiscount()
    {
        $discount = $this->cotizacion->discount;

        if ($discount) {
            // Actualizar descuento existente
            $discount->update(['amount' => $this->descuento]);
        } else {
            // Crear nuevo descuento
            $this->cotizacion->discount()->create([
                'amount' => $this->descuento,
                'cotizacion_id' => $this->cotizacion->id
            ]);
        }

        $this->emit('render');
        session()->flash('message', 'Descuento guardado correctamente');
    }

    public function mount(){
        // Cargar descuento existente si hay
        if ($this->cotizacion->discount) {
            $this->descuento = $this->cotizacion->discount->amount;
        }
    }
    public function render()
    {
        $quoterServices = $this->cotizacion->servicio()->get();
        $cliente = $this->cotizacion->cliente()->first();
        $costQuoter = $this->costoCotizacion($this->cotizacion);
        $services = servicio::whereDoesntHave('cotizacion', function($query) {
            $query->where('cotizacion_id', $this->cotizacion->id);
        })
        ->orderBy('nombre','asc')
        ->where('nombre','like','%'.$this->search . '%')
        ->where('año', '=', $this->cotizacion->start->year)
        ->paginate(6);

        return view('livewire.quoter-create')->
        with('quoterServices', $quoterServices)->
        with('cliente', $cliente)->
        with('services', $services)->
        with('costQuoter', $costQuoter);
    }
}
