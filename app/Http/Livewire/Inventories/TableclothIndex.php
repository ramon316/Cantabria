<?php

namespace App\Http\Livewire\Inventories;

use App\tablecloth;
use Livewire\Component;
use Livewire\WithPagination;

class TableclothIndex extends Component
{
    use WithPagination;

    /* Variables */
    public $search;
    protected $paginationTheme = 'bootstrap';


    protected $listeners = [
        'render'    =>  'render',
        'delete'  =>  'delete',
    ];

    
    public function render()
    {
        $tablecloths = tablecloth::
        where('name','like','%'.$this->search.'%')
        ->paginate(10);
        
        return view('livewire.inventories.tablecloth-index')->with('tablecloths',$tablecloths);
    }
    
    public function delete(tablecloth $tablecloth){
        $tablecloth->delete();
    }


}
