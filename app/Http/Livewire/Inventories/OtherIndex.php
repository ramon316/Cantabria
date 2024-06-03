<?php

namespace App\Http\Livewire\Inventories;

use App\inventory;
use Livewire\Component;
use Livewire\WithPagination;

class OtherIndex extends Component
{
    use withPagination;

    public $search;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'render'    =>  'render',
        'delete'  =>  'delete',
    ];

    public function render()
    {
        $inventories = inventory::where('color', 'like', '%'.$this->search . '%')
        ->paginate(10);
        return view('livewire.inventories.other-index')->with('inventories', $inventories);
    }

    public function delete(inventory $inventory){
        $inventory->delete();
    }
}
