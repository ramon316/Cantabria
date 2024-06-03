<?php

namespace App\Http\Livewire;

use App\evento;
use Livewire\Component;

class StatusEvent extends Component
{
    public $status;
    public $evento;

    public function mount()
    {
        if (is_null($this->evento->closed_at)) {
            $this->status = false;
        } else {
            $this->status = true;
        }
    }

    public function updatingStatus()
    {
        if ($this->status == true) {
            $this->evento->update([
                'closed_at' => null
            ]);
        } else {
            $this->evento->update([
                'closed_at' => now()
            ]);
        }
    }
    public function render()
    {

        return view('livewire.status-event');
    }
}
