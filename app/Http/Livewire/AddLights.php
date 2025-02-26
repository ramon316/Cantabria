<?php

namespace App\Http\Livewire;

use App\Light;
use Livewire\Component;
use App\Lights;

use function PHPUnit\Framework\isNull;

class AddLights extends Component
{
    public $lights = [];
    public $controls = [];
    public $evento;
    public $control;
    public $color;
    public $place;

    protected $rules = [
        'place' => 'required',
        'control' => 'required',
        'color' => 'required',
    ];

    public function mount(){
        $lightModel = new Light();
        $this->lights = $lightModel->getLights();
        $this->controls = $lightModel->getControls();

    }

    public function addLight(){

        $data = $this->validate();

        $lightModel = new Light();

        $lightModel::create([
            'place' => $data['place'],
            'control' => $data['control'],
            'color' => $data['color'],
            'evento_id' => $this->evento->id,
        ]);

        $this->reset('place', 'control', 'color');

        flasher('Luz agregada correctamente', 'success');

    }

    public function deleteLight(Light $light){
        $light->delete();
        flasher('Luz eliminada correctamente', 'error');
    }

    public function render()
    {
        $LightsCollections = $this->evento->lights()->get();
        return view('livewire.add-lights')->with('LightsCollections', $LightsCollections);
    }
}
