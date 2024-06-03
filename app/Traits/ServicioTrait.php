<?php
namespace App\Traits;

use App\evento;
use App\Precio;
use App\servicio;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

Trait ServicioTrait{

    public function añosTrait(){
        $año = (int)Carbon::now()->format('Y');
        $años = array();
        for ($i=0; $i < 4; $i++) {
            array_push($años,$año);
            $año = $año +1;
        }
        return $años;
    }

    public function diasTrait(){
        /* Se esta mandando como un arreglo  */
/*         $dias = [
             ['id'    => 0, 'dias'   => 'Domingo, Lunes, Martes, Miercoles y Jueves'],
            ['id'    => 1, 'dias'   =>' Viernes y Sábado']
        ]; */

        $dias  = DB::table('days_evento')->get();
        return $dias;
    }
}
