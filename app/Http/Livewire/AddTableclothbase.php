<?php

namespace App\Http\Livewire;

use App\tableclothbase;
use Livewire\Component;

class AddTableclothbase extends Component
{
    /* models */
    public $evento;
    public $amount;
    public $type;
    public $color;
    public $tabletypes = [];
    public $tablecolors = [];

    protected $listeners = ['render'];

    protected $validationAttributes = [
        'type' =>   'tipo de mesa',
        'color' =>  'color de la base',
        'amount'    =>  'cantidad'
    ];

    protected $rules = [
        'type'  =>  'required',
        'color' =>  'required',
        'amount'    =>  'required|numeric|min:1'
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function mount(){
        $this->tablecolors = collect();
    }

    public function render()
    {
        $this->tabletypes  = tableclothbase::select('tabletype')->distinct('tablettype')->get();
        $this->tablecolors = tableclothbase::where('tabletype', $this->type)->orderBy('color')->select('color')->get();
        return view('livewire.add-tableclothbase')->with('evento',$this->evento);
    }

    public function UpdatedType($type){
       
        $this->tablecolors = tableclothbase::where('tabletype', $type)->orderBy('color')->select('color')->get();
        
    }

    public function addTableclothbase(){
        /* validation */
        $data = $this->validate();

        /* if pass, fiind the collect */
        $tableclothbase = tableclothbase::whereTabletype($data['type'])
                            ->whereColor($data['color'])
                            ->first();
        /* Check if exist */
        $exist = $this->evento->tableclothbase->where('id', $tableclothbase->id)->first();
        
        if ($data['amount']<= $tableclothbase->amount && !$exist) {
            /* innsert attach row event_tableclothbase */
            $this->evento->tableclothbase()->attach($tableclothbase->id, ['amount'=> $data['amount']]);
    
            $this->emit('render');

            /* clean fields */
            $this->type = '';
            $this->color = '';
            $this->amount = '';

            flasher('Base agregada al evento', 'success');
        }
    }

    public function deleteTableclothbase(Tableclothbase $tableclothbase){
        $this->evento->tableclothbase()->detach($tableclothbase->id);
        $this->emit('render');

        flasher('Base eliminada', 'error');
    }
}
