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
    public $chairUpdates = [];
    public $availableColors=[];

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
        'amount'    =>  'required|numeric|min:1',
        ];

    public function mount(){
        $this->tablenames = collect();
        $this->tablecolors = collect();
        $this->tablecolorbases = collect();
        $this->chairtypes = collect();
        $this->chaircolors = collect();

        // Cargar los datos existentes para los registros
    $records = DB::table('evento_tablecloth')
    ->join('eventos', 'eventos.id', '=', 'evento_tablecloth.evento_id')
    ->join('tablecloths', 'evento_tablecloth.tablecloth_id', '=', 'tablecloths.id')
    ->join('tableclothbases', 'evento_tablecloth.tableclothbase_id', '=', 'tableclothbases.id')
    ->leftJoin('chairs', 'evento_tablecloth.chair_id', '=', 'chairs.id')
    ->where('eventos.id', '=', $this->evento->id)
    ->select([
        'evento_tablecloth.id',
        'evento_tablecloth.chairs as chairs_count',
        'chairs.typechair',
        'chairs.color as chair_color',
    ])
    ->get();

// Inicializar $chairUpdates con los valores existentes
foreach ($records as $record) {
    if ($record->typechair && $record->chair_color) {
        $this->chairUpdates[$record->id] = [
            'chairtype' => $record->typechair,
            'chaircolor' => $record->chair_color,
            'chairs' => $record->chairs_count
        ];

        // También inicializar los colores disponibles para este tipo de silla
        $this->availableColors[$record->id] = chair::where('typechair', $record->typechair)
            ->select('color')
            ->distinct()
            ->orderBy('color')
            ->get()
            ->pluck('color')
            ->toArray();
    }
}


    }

    public function render()
    {

        $this->tabletypes = tablecloth::select('tabletype')->distinct('tabletype')->get();
        $this->tablenames = tablecloth::where('tabletype', $this->type)->orderby('name')->select('name')->distinct('name')->get();
        $this->tablecolors = tablecloth::where('name', $this->name)->where('tabletype', $this->type)->orderby('tonality')->select('tonality')->distinct('tonality')->get();
        $this->chairtypes = chair::select('typechair')->distinct('typechair')->orderby('typechair')->get();
        $this->chaircolors = chair::select('color')->whereTypechair($this->chairtype)->orderby('color')->get();
        $this->tablecolorbases = tableclothbase::where('tabletype', $this->type)->orderby('color')->select('color')->distinct('color')->get();
        /* find tablecloths rows */
        /* $records = DB::select('Select
        evento_tablecloth.id,
        tablecloths.tabletype,
        tablecloths.name,
        tablecloths.tonality,
        tableclothbases.color,
        evento_tablecloth.amount,
        chairs.typechair,
        chairs.color,
        evento_tablecloth.chairs
        from evento_tablecloth
        JOIN eventos on eventos.id = evento_tablecloth.evento_id
        join tablecloths on evento_tablecloth.tablecloth_id = tablecloths.id
        join tableclothbases on evento_tablecloth.tableclothbase_id = tableclothbases.id
        join chairs on evento_tablecloth.chair_id = chairs.id
        where eventos.id = ' . $this->evento->id); */
        $records = DB::table('evento_tablecloth')
        ->join('eventos', 'eventos.id', '=', 'evento_tablecloth.evento_id')
        ->join('tablecloths', 'evento_tablecloth.tablecloth_id', '=', 'tablecloths.id')
        ->join('tableclothbases', 'evento_tablecloth.tableclothbase_id', '=', 'tableclothbases.id')
        ->leftJoin('chairs', 'evento_tablecloth.chair_id', '=', 'chairs.id')
        ->where('eventos.id', '=', $this->evento->id)
        ->select([
            'evento_tablecloth.id',
            'tablecloths.tabletype',
            'tablecloths.name',
            'tablecloths.tonality',
            'tableclothbases.color as base_color',
            'evento_tablecloth.amount',
            'evento_tablecloth.chairs',
            'chairs.typechair',
            'chairs.color as chair_color',
        ])
        ->get();

        // Inicializa $availableColors para todos los registros
    foreach ($records as $record) {
        if (!isset($this->availableColors[$record->id])) {
            $this->availableColors[$record->id] = [];
        }

        // Si ya tenemos un tipo de silla seleccionado, cargamos los colores
        if (isset($this->chairUpdates[$record->id]['chairtype'])) {
            $this->availableColors[$record->id] = chair::where('typechair', $this->chairUpdates[$record->id]['chairtype'])
                ->select('color')
                ->distinct()
                ->orderBy('color')
                ->get()
                ->pluck('color')
                ->toArray();
        }
    }

        return view('livewire.add-tablecloth')
        ->with('records', $records);
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


    public function UpdatedChairUpdates($value, $key)
{
    $parts = explode('.', $key);
    $recordId = $parts[0];
    $field = $parts[1];

    // Si estamos actualizando el tipo de silla, actualizar los colores disponibles
    // Si estamos actualizando el tipo de silla, actualizar los colores disponibles
    if ($field === 'chairtype') {
        // Obtener los colores disponibles para este tipo de silla
        $this->availableColors[$recordId] = chair::where('typechair', $value)
            ->select('color')
            ->distinct()
            ->orderBy('color')
            ->get()
            ->pluck('color')
            ->toArray();
    }
}

    public function updateChairs()
    {
        foreach ($this->chairUpdates as $recordId => $data) {
            // Validar que tenemos todos los datos necesarios
            if (empty($data['chairtype']) || empty($data['chaircolor']) || empty($data['chairs'])) {
                continue; // Saltar registros incompletos
            }

            // Encontrar la silla correspondiente
            $chair = chair::select('id')
                ->whereTypechair($data['chairtype'])
                ->whereColor($data['chaircolor'])
                ->first();

            if (!$chair) {
                continue; // No se encontró la silla
            }

            // Actualizar el registro
            DB::table('evento_tablecloth')
                ->where('id', $recordId)
                ->update([
                    'chair_id' => $chair->id,
                    'chairs' => $data['chairs'],
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
        }

        // Limpiar después de actualizar
       /*  $this->chairUpdates = []; */
        $this->emit('render');

        flasher('Sillas actualizadas correctamente', 'success');
    }

    public function addTablecloth(){
        $data = $this->validate();

        /* take the amount */
        $amount= $data['amount'];
        /* take chairs */
       /*  $chairs = $data['chairs']; */

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
        /* $chair = chair::select('id')->
        whereTypechair($data['chairtype'])->
        whereColor($data['chaircolor'])->
        first(); */

        /* Insert into row */
        if (isset($amount, $tablecloth, $tablecolorbase)) {
            $register = DB::table('evento_tablecloth')->
            insert([
                'evento_id' => $this->evento->id,
                'tablecloth_id' =>  $tablecloth->id,
                'tableclothbase_id' =>  $tablecolorbase->id,
                /* 'chair_id'  =>  $chair->id, */
                'amount'    =>  $amount,
                /* 'chairs'    =>  $chairs, */
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
