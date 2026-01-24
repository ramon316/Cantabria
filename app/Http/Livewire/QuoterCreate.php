<?php

namespace App\Http\Livewire;

use App\servicio;
use App\Discount;
use App\evento;
use App\Events\EventCreated;
use App\Traits\CotizacionTrait;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

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

    public function createEventFromQuotation()
    {
        // Verificar que la cotización tenga servicios
        if ($this->cotizacion->servicio()->count() === 0) {
            session()->flash('error', 'La cotización debe tener al menos un servicio para crear un evento.');
            return;
        }

        // Verificar que la fecha del evento no esté ocupada
        $fechaOcupada = evento::where('start', $this->cotizacion->start)->exists();
        if ($fechaOcupada) {
            session()->flash('error', 'Ya existe un evento en la fecha seleccionada. Por favor, modifique la fecha de la cotización.');
            return;
        }

        try {
            DB::beginTransaction();

            // Crear el evento con los datos de la cotización
            $evento = evento::create([
                'cliente_id' => $this->cotizacion->cliente_id,
                'user_id' => auth()->user()->id,
                'title' => $this->cotizacion->title,
                'subtitle' => $this->cotizacion->subtitle,
                'start' => $this->cotizacion->start,
                'end' => $this->cotizacion->end,
                'invitados' => $this->cotizacion->invitados,
                'comment' => $this->cotizacion->comment,
            ]);

            // Copiar los servicios de la cotización al evento
            $servicios = $this->cotizacion->servicio()->get();
            foreach ($servicios as $servicio) {
                $evento->servicio()->attach($servicio->id, [
                    'cantidad' => $servicio->pivot->cantidad,
                    'costo' => $servicio->pivot->costo,
                    'regalo' => $servicio->pivot->regalo,
                ]);
            }

            // Copiar el descuento si existe
            if ($this->cotizacion->discount) {
                $evento->discount()->create([
                    'amount' => $this->cotizacion->discount->amount,
                    'evento_id' => $evento->id,
                ]);
            }

            // Disparar el evento de creación (esto crea automáticamente el checklist)
            event(new EventCreated($evento));

            DB::commit();

            // Redirigir al evento creado con mensaje de éxito
            session()->flash('success', 'Evento creado exitosamente desde la cotización.');
            return redirect()->route('eventos.show', $evento);

        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Ocurrió un error al crear el evento: ' . $e->getMessage());
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
