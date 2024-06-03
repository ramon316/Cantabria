<?php
namespace App\Http\Livewire;
use App\cliente;
use Livewire\Component;
use Livewire\WithPagination;

class ClientesIndex extends Component
{/*  */
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    { 
        $clientes = cliente::where('nombre','LIKE',"%$this->search%")
                ->orWhere('email', 'like', "%$this->search%")
                ->paginate(10);
                

        return view('livewire.clientes-index')->with('clientes',$clientes);        
    }
}
