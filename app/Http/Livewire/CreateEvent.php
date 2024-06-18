<?php

namespace App\Http\Livewire;

use App\cliente;
use Livewire\Component;


class CreateEvent extends Component
{
    public $clientes;
    public $title;
    public $subtitle;
    public $horas;
    public $start;
    public $end;
    public $invitados;
    public $empresariales = ['Posada', 'aniversario','capacitación','conferencia','graduación','otros'];
    public $sociales = ['Boda','XV años','Aniversario','Graduación','otros'];
    public $subtitles = [];

    public function mount(){
        $this->clientes = cliente::all();

    }
    public function render()
    {
        return view('livewire.create-event');
    }
}
