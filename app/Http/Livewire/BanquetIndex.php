<?php

namespace App\Http\Livewire;

use App\Banquet;
use App\evento;
use Livewire\Component;

class BanquetIndex extends Component
{
    /* Atributos */
    public $banquetCreate;
    public $banquetUpdate;
    public $banquet;
    public $evento;
    public $entry;
    public $steak;
    public $sauce;
    public $fitting;
    public $fitting2;
    public $showSecondfitting = false;
    public $notes;
    public $entrys = ['Elote', 'Chilaca', 'Champiñones', 'All red grill'];
    public $steaks = ['Fajita de pollo', 'Rollo de pollo Relleno (Jamón y Queso)'];
    public $sauces = ['Salsa a base de Chabacano y chipotle', 'Salsa en 3 quesos', 'Salsa poblana con elote', 'Salsa de tocino'];
    public $fittings = ['Ensalada frutal', 
                        'Ejotes a la española', 
                        'Papa abanico Black Cheff al horno', 
                        'Tallarines a la Mantequilla', 
                        'Pasta garden', 
                        'Verduras al vapor', 
                        'Perla de papa bañada en salsa BBQ naranja', 
                        'Pure de papa artesanal'];

    /* Reglas de validación */
    protected $rules = [
        'entry' =>  'required',
        'steak' =>  'required',
        'sauce' =>  'required',
        'fitting'   =>  'required'
    ];

    protected $validationAttributes = [
        'entry' =>  'entrada',
        'steak' =>  'plati fuerte',
        'sauce' =>  'salseo',
        'fitting'=> 'guarnicion'
    ];

    public function mount(){
        /* Comprobamos si es que tiene algun banquete registrado */
        $this->banquet = $this->evento->banquet()->first();
        if ($this->banquet) {
            $this->entry = $this->banquet->entry;
            $this->steak = $this->banquet->steak;
            $this->sauce = $this->banquet->sauce;
            $this->fitting = $this->banquet->fitting;
            $this->fitting2 = $this->banquet->fitting2;
            $this->notes = $this->banquet->notes;
        }
    }

    public function format(){
        return redirect()->route('banquetes.formato',$this->evento->id);
    }

    public function render()
    {
        
        return view('livewire.banquet-index')
        ->with('entrys',$this->entrys)
        ->with('steaks', $this->steaks)
        ->with('sauces', $this->sauces)
        ->with('fittings', $this->fittings);
    }

    public function saveBanquet(){
        $data = $this->validate();
        
        /* Validar si ya existe el registro. */
        if ($this->banquet) {
            $this->banquetUpdate = $this->banquet->update([
                'entry'     =>  $data['entry'],
                'steak'     =>  $data['steak'],
                'sauce'     =>  $data['sauce'],
                'fitting'   =>  $data['fitting'],
                'fitting2'  =>  $this->fitting2,
                'notes'     =>  $this->notes
            ]);
        }
        else{
            $this->banquetCreate = Banquet::create([
                'evento_id' =>  $this->evento->id,
                'entry'     =>  $data['entry'],
                'steak'     =>  $data['steak'],
                'sauce'     =>  $data['sauce'],
                'fitting'   =>  $data['fitting'],
                'fitting2'  =>  $this->fitting2,
                'notes'     =>  $this->notes
            ]);

        }

        $this->banquet = $this->evento->banquet()->first();


        if ($this->banquetCreate) {
            flash('Se registro el banquete con éxito');
        }
        else{
            flash('El registro se ha actualizado');
        }

    }

    public function updatingFitting(){
        $this->showSecondfitting = true;
    }
}
