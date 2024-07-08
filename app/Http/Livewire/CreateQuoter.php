<?php

namespace App\Http\Livewire;

use App\cliente;
use App\cotizacion;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CreateQuoter extends Component
{
    public $cliente;
    public $clientesAll = [];
    public $title;
    public $subtitle;
    public $start;
    public $end;
    public $invitados;
    public $empresariales = ['Posada', 'Aniversario','Capacitación','Conferencia','Graduación','otros'];
    public $sociales = ['Boda','XV años','Aniversario','Graduación','otros'];
    public $subtitles = [];

    /* Rules */
    protected $rules = [
        'cliente' => 'required',
        'title' => 'required',
        'subtitle' => 'required',
        'start' => 'required',
        'end' => 'required',
        'invitados' => 'required|min:1',
    ];

    protected $validationAttributes = [
        'cliente' => 'cliente',
        'title' => 'tipo de evento',
        'subtitle' => 'subtipo de evento',
        'start' => 'fecha de inicio',
        'end' => 'fecha de finalización',
    ];

    public function mount(){
        $this->clientesAll = cliente::orderBy('nombre','asc')->get();

    }

    public function updatingTitle($value){

        if ($value == "Empresarial") {
        $this->subtitles = $this->empresariales;
        }
        else {
            $this->subtitles = $this->sociales;
        }
    }

    public function save(){

        $this->validate();
          $cotizacion =  cotizacion::create([
            'cliente_id' => $this->cliente,
            'user_id' => Auth::user()->id,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'start' => $this->start,
            'end' => $this->end,
            'invitados' => $this->invitados,
        ]);

        return redirect('/cotizacion/'.$cotizacion->id);
    }

    public function render()
    {

        return view('livewire.create-quoter');
    }
}
