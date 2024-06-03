<?php

namespace App\Http\Livewire;

use App\recommendation;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;


class Recommendations extends Component
{
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['delete'];

    public $search;
    public $modal = true;
    public $name;
    public $comment;
    public $image;
    public $nameImage;
    public $identificador;

    protected $validationAttributes = [
        'name'  =>  'nombre',
        'comment'   =>  'comentario',
        'image'     =>  'imagen de usuario'
    ];

    public function mount(){
        $this->identificador = rand();
    }

    public function save(){
       
        $this->validate([
            'name'  =>  'required',
            'comment'   =>  'required',
            'image'     =>  'required|image|max:1024'
        ]);

        $name = $this->image->store('public/recommendations');

        recommendation::create([
            'name' =>   $this->name,
            'comment'   =>  $this->comment,
            'image' =>  $name
        ]);

        $this->reset(['name', 'comment', 'image']);
        $this->identificador = rand();

        $this->dispatchBrowserEvent('closeModal');
    }

    public function delete(recommendation $recommendation){
        Storage::delete($recommendation->image);
        $recommendation->delete(); 
    }

    public function edit(recommendation $recommendation){
        /* Mostramos modal y cargamos información */
        $this->dispatchBrowserEvent('showModal');
    }

    public function render()
    {
        $recommendations = recommendation::Where('name','like','%'.$this->search.'%')->paginate(10);
        return view('livewire.recommendations')->with('recommendations',$recommendations);
    }

}
