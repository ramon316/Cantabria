<?php

namespace App\Http\Livewire;

use App\pago;
use Livewire\Component;

class PaymentsList extends Component
{
    public $evento;

    public function render()
    {
        $payments = pago::where('evento_id', $this->evento->id)->get();
        return view('livewire.payments-list')->with('payments', $payments);
    }

    public function delete($id)
    {
        $payment = pago::find($id);
        $payment->delete();
    }
}
