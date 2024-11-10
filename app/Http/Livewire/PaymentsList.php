<?php

namespace App\Http\Livewire;

use App\pago;
use Livewire\Component;

class PaymentsList extends Component
{


    public function render()
    {
        $payments = pago::all();
        return view('livewire.payments-list')->with('payments', $payments);
    }

    public function delete($id)
    {
        $payment = pago::find($id);
        $payment->delete();
    }
}
