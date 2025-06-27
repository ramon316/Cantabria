<?php

namespace App\Http\Livewire;

use App\evento;
use App\servicio;
use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\EventoTrait;

use function PHPUnit\Framework\isNull;

class AddService extends Component
{
    use EventoTrait;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    /* Variables */
    public $search = '';
    public $servicioName = '';
    public $servicioId;
    public $count = 1;
    public $gift;
    public $evento;

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

    public function close()
    {
        $this->dispatchBrowserEvent('closeModal');
        $this->gift = '';
    }

    public function save($value, $id, $gift)
    {

        /* Verify the value of $gift not empty */
        if ($gift == "") {
            $gift = 0;
        }

        $service = servicio::find($id);
        $this->evento->servicio()->attach($service->id, ['cantidad' => $value, 'costo' => $service->costo, 'regalo' => $gift]);
        $this->emit('render');
        /* Cerramos el modal */
        $this->dispatchBrowserEvent('closeModal');
        /* Reset the properties of modal */
        $this->gift = '';
        $this->count = 1;
    }

    public function deleteService($id)
    {
        $this->evento->servicio()->detach($id);
        $this->emit('render');
    }

    public function render()
    {
        /*  $eventServices = $this->evento->servicio()->get(); */
        /* dd($this->evento->servicio()->get()); */
        $eventServices = $this->evento->servicio()->get();
        $costEvent = $this->costoEvento($this->evento);
        $eventoId = $this->evento->id;

        $services = Servicio::whereDoesntHave('evento', function ($query) use ($eventoId) {
            $query->where('evento_id', $eventoId);
        })
        ->orderBy('nombre','asc')
        ->where('nombre','like','%'.$this->search . '%')
        ->where('año', '=', $this->evento->start->year)
        ->paginate(6);

        /* $services = servicio::where('nombre', 'LIKE', "%$this->search%")
        ->orderBy('nombre','asc')
        ->paginate(6); */
        return view('livewire.add-service')
            ->with('services', $services)
            ->with('eventServices', $eventServices)
            ->with('costEvent', $costEvent);
    }
}
