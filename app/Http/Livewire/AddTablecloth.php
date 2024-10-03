<?php

namespace App\Http\Livewire;

use App\chair;
use App\evento;
use App\tablecloth;
use App\tableclothbase;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

use function PHPSTORM_META\type;

class AddTablecloth extends Component
{
    public $evento;
    public $amount;
    public $chairs;
    public $type;
    public $name;
    public $color;
    public $colorbase;
    public $chairtype;
    public $chaircolor;
    public $tabletypes = [];
    public $tablenames = [];
    public $tablecolors = [];
    public $tablecolorbases = [];
    public $chairtypes = [];
    public $chaircolors = [];

    protected $listeners = ['render'];

    protected $validationAttributes = [
        'type'  =>  'tipo de mantel',
        'name'  =>  'nombre de mantel',
        'color' =>  'color de mantel',
        'colorbase' =>  'color de la base',
        'chairtype' =>  'tipo de silla',
        'chaircolor'    =>  'color de silla',
        'amount'    =>  'cantidad',
    ];

    protected $rules = [
        'type' => 'required',
        'name'  => 'required',
        'color' =>  'required',
        'colorbase' =>  'required',
        'chairtype' =>  'required',
        'chaircolor'    =>  'required',
        'amount'    =>  'required|numeric|min:1',
        'chairs'    =>  'required|numeric|min:1'
        ];

    public function mount(){
        $this->tablenames = collect();
        $this->tablecolors = collect();
        $this->tablecolorbases = collect();
        $this->chairtypes = collect();
        $this->chaircolors = collect();
    }

    public function render()
    {
        $this->tabletypes = tablecloth::select('tabletype')->distinct('tabletype')->get();
        $this->tablenames = tablecloth::where('tabletype', $this->type)->orderby('name')->select('name')->distinct('name')->get();
        $this->tablecolors = tablecloth::where('name', $this->name)->where('tabletype', $this->type)->orderby('tonality')->select('tonality')->distinct('tonality')->get();
        $this->chairtypes = chair::select('typechair')->distinct('typechair')->orderby('typechair')->get();
        $this->chaircolors = chair::select('color')->whereTypechair($this->chairtype)->orderby('color')->get();
        /* find tablecloths rows */
        $records = DB::select('Select
        evento_tablecloth.id,
        tablecloths.tabletype,
        tablecloths.name,
        tablecloths.tonality,
        tableclothbases.color,
        chairs.typechair,
        chairs.color as chaircolor,
        evento_tablecloth.amount,
        evento_tablecloth.chairs
        from evento_tablecloth JOIN eventos on eventos.id = evento_tablecloth.evento_id
        join tablecloths on evento_tablecloth.tablecloth_id = tablecloths.id
        join tableclothbases on evento_tablecloth.tableclothbase_id = tableclothbases.id
        join chairs on evento_tablecloth.chair_id = chairs.id
        where eventos.id = ' . $this->evento->id);

        return view('livewire.add-tablecloth')->with('records', $records);
    }

    public function UpdatedType($type){
        $this->tablenames = tablecloth::where('tabletype', $type)->orderby('name')->select('name')->distinct('name')->get();
        $this->name = '';
        $this->color = '';
        $this->amount='';
    }

    public function UpdatedName($name){
        $this->tablecolors = tablecloth::where('name', $name)
                            ->where('tabletype', $this->type)->orderby('tonality')->select('tonality')->distinct('tonality')->get();
                            /* comparar si el type existe en el nuevo tablecolors */
    }

    public function UpdatedColor(){
        $this->tablecolorbases = tableclothbase::where('tabletype', $this->type)->get();
    }

    public function addTablecloth(){
        $data = $this->validate();

        /* take the amount */
        $amount= $data['amount'];
        /* take chairs */
        $chairs = $data['chairs'];

        /* find tablecloth id */
        $tablecloth  = tablecloth::select('id')->
        whereTabletype($data['type'])->
        whereName($data['name'])->
        whereTonality($data['color'])->
        first();

        /* find tableclothbase id */
        $tablecolorbase = tableclothbase::select('id')->
        whereTabletype($data['type'])->
        whereColor($data['colorbase'])->
        first();

        /* find the chair */
        $chair = chair::select('id')->
        whereTypechair($data['chairtype'])->
        whereColor($data['chaircolor'])->
        first();

        /* Insert into row */
        if (isset($amount, $tablecloth, $tablecolorbase, $chair)) {
            $register = DB::table('evento_tablecloth')->
            insert([
                'evento_id' => $this->evento->id,
                'tablecloth_id' =>  $tablecloth->id,
                'tableclothbase_id' =>  $tablecolorbase->id,
                'chair_id'  =>  $chair->id,
                'amount'    =>  $amount,
                'chairs'    =>  $chairs,
                'created_at'    =>  date('Y-m-d H:i:s'),
                'updated_at'    =>  date('Y-m-d H:i:s'),
            ]);

            /* Actualizamos a tru el checklist manteleria */
             /* Actualizamos el checklist */
             /* $this->evento->Checklist->update([
                'manteleria'  =>  true,
            ]); */

            $this->amount = '';
            $this->type = '';
            $this->name = '';
            $this->color = '';
            $this->colorbase = '';
            $this->chairtype = '';
            $this->chaircolor = '';
            $this->chairs = '';

            flasher('Se guardo la manteleria', 'success');

        }
        else{
            flasher('Existe un problema de registro', 'error');
        }

    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function deleteTablecloth($id){
        /* Delete that row Id */
        $delete = DB::table('evento_tablecloth')->whereId($id)->delete();

        if ($delete == 1) {
            flasher('Mantelería eliminada', 'success');
        }
        else{
            flasher('No es posible eliminar el registro', 'error');
        }
        $this->emit('render');

    }

}
