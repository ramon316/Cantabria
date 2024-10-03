<?php

namespace App\Http\Livewire;

use App\evento;
use App\floralbase;
use Livewire\Component;
use App\Traits\EventoTrait;

class AddEventoFloralbase extends Component
{
    use EventoTrait;

    /* Variables */
    public $napkins = [];
    public $plates = [];
    public $categorys = [];
    public $names = [];
    public $category = '';
    public $name = '';
    public $records;
    public $evento;
    public $amount;
    public $banquetExist;

    protected $validationAttributes = [
        'category'  =>  'categoría',
        'name'  =>  'nombre',
        'amount'    =>  'cantidad',
        'napkins'    =>  'servilletas',
        'plantes'    =>  'platos',
    ];

    protected $rules = [
        'category' => 'required',
        'name'  => 'required',
        'amount'    =>  'required|numeric|min:1',
    ];

    public function mount()
    {
        $this->banquetExist = $this->banquetExistTrait($this->evento);
        $this->categorys = collect();
        $this->names = collect();
        $this->records = collect();

    }

    public function UpdatedCategory($category)
    {
        $this->names = floralbase::where('category', $category)->select('name')->distinct('name')->orderBy('name')->get();
    }

    public function save()
    {
        /* agregamos la validación */
        $this->validate();
        /* Buscamos el registro de la base floral */
        $floralbase = floralbase::where('category', $this->category)->where('name', $this->name)->first();

        if ($this->banquetExist == true) {
            $this->evento->floralbase()->attach($floralbase->id,
            [
                'napkins' => $this->napkins,
                'plates' => $this->plates,
                'amount' => $this->amount
            ]);
        }
        else {
            $this->evento->floralbase()->attach($floralbase->id,
            [
                'amount' => $this->amount
            ]);
        }


         /* Actualizamos el checklist */
         /* $this->evento->Checklist->update([
            'floral'  =>  true,
        ]); */

        /* Mostramos mensajede confirmacion */
        flasher('Registro agregado', 'success');

        /* Reset valores */
        $this->reset(['category', 'name', 'napkins', 'plates', 'amount']);
    }

    public function delete($id){
        $this->evento->floralbase()->detach($id);
        flasher('Registro eliminado', 'error');
    }

    public function render()
    {
        /* Obtenemos los valores de las categorias */
        $this->categorys = floralbase::select('category')->distinct('category')->orderby('category')->get();
        $this->names = floralbase::where('category', $this->category)->select('name')->distinct('name')->orderBy('name')->get();

        $this->records = $this->evento->floralbase()->get();

        return view('livewire.add-evento-floralbase')
            ->with('records', $this->records);
    }
}
