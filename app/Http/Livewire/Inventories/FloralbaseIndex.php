<?php

namespace App\Http\Livewire\Inventories;

use App\floralbase;
use Livewire\Component;
use Livewire\WithPagination;

class FloralbaseIndex extends Component
{

    use WithPagination;

    public $search;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'render'    =>  'render',
        'delete'  =>  'delete',
    ];

    public function render()
    {
        $floralbases = floralbase::where('name', 'like', '%'.$this->search . '%')
                        ->paginate(10);
        return view('livewire.inventories.floralbase-index')
                ->with('floralbases', $floralbases);
    }

    public function delete(floralbase $floralbase){
        $floralbase->delete();
    }
}
