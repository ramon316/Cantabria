<?php

namespace App\Http\Livewire;

use App\pago;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ValidarPagos extends Component
{
    use WithPagination;

    public $search;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['rechazar'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = pago::with(['evento', 'cliente', 'user'])
            ->where('status', pago::STATUS_PENDIENTE);

        if ($this->search) {
            $query->whereHas('cliente', function ($q) {
                $q->where('nombre', 'like', '%' . $this->search . '%');
            })->orWhereHas('evento', function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%');
            });
        }

        $pagos = $query->latest()->paginate(10);

        return view('livewire.validar-pagos', [
            'pagos' => $pagos
        ]);
    }

    public function validar($id)
    {
        $pago = pago::findOrFail($id);
        $pago->update([
            'status' => pago::STATUS_VALIDADO,
            'user_id_validator' => Auth::id(),
            'updated_at' => now()
        ]);

        session()->flash('message', 'Pago validado correctamente.');
    }

    public function rechazar($id, $observaciones = null)
    {
        $pago = pago::findOrFail($id);
        $pago->update([
            'status' => pago::STATUS_RECHAZADO,
            'user_id_validator' => Auth::id(),
            'observaciones' => $observaciones,
            'updated_at' => now()
        ]);

        session()->flash('message', 'Pago rechazado.');
    }
}
