<?php

namespace App\Http\Livewire;

use App\cliente;
use App\meet;
use App\User;
use App\reason;
use Livewire\Component;

class EditMeet extends Component
{
    public $meetId;
    public $seller;
    public $client;
    public $reason_id;
    public $date;

    public $sellers = [];
    public $clients = [];
    public $reasons = [];

    public $showModal = false;

    protected $listeners = ['editMeet'];

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->reasons = reason::orderby('reason')->get();

        $user = auth()->user();

        // Si es administrador, obtener todos los usuarios
        if ($user->hasRole('Administrador')) {
            $this->sellers = User::orderby('name')->get();
        } else {
            // Si no es administrador, obtener solo usuarios con el mismo rol
            $userRoles = $user->roles->pluck('id');
            $this->sellers = User::whereHas('roles', function($query) use ($userRoles) {
                $query->whereIn('roles.id', $userRoles);
            })->orderby('name')->get();
        }

        $this->clients = cliente::orderby('nombre')->get();
    }

    public function editMeet($meetId)
    {
        $this->resetValidation();

        $meet = meet::findOrFail($meetId);

        $this->meetId = $meet->id;
        $this->seller = $meet->user_id;
        $this->client = $meet->cliente_id;
        $this->reason_id = $meet->reason_id;
        $this->date = $meet->start->format('Y-m-d\TH:i');

        $this->showModal = true;
    }

    public function updateMeet()
    {
        $this->validate([
            'seller' => 'required',
            'client' => 'required',
            'reason_id' => 'required',
            'date' => 'required',
        ], [
            'seller.required' => 'Debe seleccionar al vendedor',
            'client.required' => 'Debe seleccionar al cliente',
            'date.required' => 'Debe seleccionar la fecha y hora',
            'reason_id.required' => 'Debe seleccionar el motivo',
        ]);

        $meet = meet::findOrFail($this->meetId);
        $user = User::find($this->seller);

        $meet->update([
            'user_id' => $this->seller,
            'cliente_id' => $this->client,
            'start' => $this->date,
            'reason_id' => $this->reason_id,
            'title' => $user->name,
        ]);

        $this->showModal = false;

        flasher('Se ha actualizado la reunión correctamente');

        // Emitir evento para refrescar el listado
        $this->emit('meetUpdated');

        // Forzar re-renderizado del componente padre
        $this->emitSelf('$refresh');
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.edit-meet');
    }
}
