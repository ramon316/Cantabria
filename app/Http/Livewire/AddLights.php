<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Lights;

use function PHPUnit\Framework\isNull;

class AddLights extends Component
{
    public $lights = [];
    public $color1;
    public $color2;
    public $color3;
    public $evento;

    protected $rules = [
        'color1' => 'required',
        'color2' => 'required',
        'color3' => 'required',
    ];

    public function mount(){
        $lightModel = new Lights();
        $this->lights = $lightModel->getLights();

        $lights = $this->evento->light;
        if ($lights) {
            $this->color1 = $lights->color1;
            $this->color2 = $lights->color2;
            $this->color3 = $lights->color3;
        }
    }

    public function addLight(){

        $data = $this->validate();

        $lightModel = new Lights();

        /* Validamos que no exista */
        if ($this->evento->light) {
            $this->evento->light->update([
                'color1' => $this->color1,
                'color2' => $this->color2,
                'color3' => $this->color3,
            ]);
            flasher('Luces actualizadas correctamente', 'success');
        }
        else {
            try {
                $lightModel->create([
                    'color1' => $this->color1,
                    'color2' => $this->color2,
                    'color3' => $this->color3,
                    'evento_id' => $this->evento->id,
                ]);
                flasher('Luces agregadas correctamente', 'success');
            } catch (\Exception $e) {
                flasher('Error al agregar luces:' . $e->getMessage(), 'error');
                return;
            }
        }

    }

    public function render()
    {
        return view('livewire.add-lights')->with('lights', $this->lights);
    }
}
