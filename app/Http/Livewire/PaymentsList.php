<?php

namespace App\Http\Livewire;

use App\pago;
use Livewire\Component;

class PaymentsList extends Component
{
    public $evento;

    public function render()
    {
        $query = pago::with(['evento', 'cuenta', 'user'])->where('evento_id', $this->evento->id);

        if (!auth()->user()->hasRole('Administrador')) {
            $query->where('status', pago::STATUS_VALIDADO);
        }

        $payments = $query->get();
        return view('livewire.payments-list')->with('payments', $payments);
    }

    public function delete($id)
    {
        $payment = pago::find($id);
        $payment->delete();
    }
}
