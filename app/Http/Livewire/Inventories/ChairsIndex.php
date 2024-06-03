<?php

namespace App\Http\Livewire\Inventories;

use App\chair;
use Livewire\Component;

class ChairsIndex extends Component
{

    public function render()
    {
        $chairs = chair::paginate(10);
        return view('livewire.inventories.chairs-index')
        ->with('chairs', $chairs);
    }
}
