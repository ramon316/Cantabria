<?php

namespace App\Http\Livewire\Inventories;

use App\tableclothbase;
use Livewire\Component;
use Livewire\WithPagination;

class TableclothbaseIndex extends Component
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
        $tableclothbases = tableclothbase::where('color','like','%'.$this->search.'%')
        ->paginate(10);

        return view('livewire.inventories.tableclothbase-index')
            ->with('tableclothbases', $tableclothbases);
    }

    public function delete(tableclothbase $tableclothbase){
        $tableclothbase->delete();
    }
}
