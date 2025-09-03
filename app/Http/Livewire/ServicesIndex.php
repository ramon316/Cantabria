<?php

namespace App\Http\Livewire;

use App\servicio;
use Livewire\Component;
use Livewire\WithPagination;

class ServicesIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $perPage = 10;
    public $sortField = 'nombre';
    public $search = '';

    public function render()
    {
        return view('livewire.services-index' , [
            'services' => servicio::orderBy($this->sortField)->
            where('nombre', 'LIKE', "%$this->search%")->
            paginate($this->perPage)
        ]);
    }
}
