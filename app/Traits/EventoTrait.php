<?php
namespace App\Traits;

use App\pago;
use App\evento;
use App\Precio;
use Carbon\Carbon;
use Illuminate\Support\Str;


Trait EventoTrait{

   public $dia;

   public function serviciosTrait(evento $evento){
    $servicios = $evento->servicio;
    return $servicios;
   }

   public function costoEvento(evento $evento){

      /**Obtenemos todos los servicios de este evento */
      $servicios = $this->serviciosTrait($evento);
      /**Validamos si cuenta con alguno de los servicios propios */
      $costoEvento=0;
      foreach ($servicios as $servicio ) {
         /* Aqui obtenemos el costo del evento
         El costo multiplicada por la cantidad*/
         if ($servicio->pivot->regalo == 0 ) {
            $costoEvento = $servicio->pivot->costo * $servicio->pivot->cantidad + $costoEvento;
         }
      }

      return $costoEvento;
   }

   public function diaEvento(evento $evento){
      $fechaEvento = evento::select()->whereId($evento->id)->first();
      $fechaEvento = date('w',strtotime($fechaEvento->start));
      /* Validamos si es alguno de los días */

      if ($fechaEvento<=4 or $fechaEvento ==7) {
         $this->dia = 0;
      }
      else{
         $this->dia = 1;
      }
      return $this->dia;
   }

   public function añoEvento(evento $evento){
      /* Obtenemos el año del evento */
      $fechaEvento = evento::select()->whereId($evento->id)->first();
      $fechaEvento = date('Y',strtotime($fechaEvento->start));
      return $fechaEvento;
   }

   public function abonoEvento(evento $evento){
    $abonoEvento = pago::where('evento_id',$evento->id)->get()->sum('monto');
    return $abonoEvento;
   }

   public function diferenciaEvento(evento $evento){
    $costoEvento = $this->costoEvento($evento);
    $abonoEvento = $this->abonoEvento($evento);
    $diferenciaEvento = $costoEvento - $abonoEvento;
    return $diferenciaEvento;
   }

   public function totalEvento(evento $evento){
    $discount = $evento->discount->amount ?? 0;
    $total = $this->costoEvento($evento) - $discount;
    return $total;
   }

   /* Validamos si hay un servicio de banquete  */
   public function banquetExistTrait(evento $evento){
    $servicios = $evento->servicio()->get();
    /* Validamos si hay un servicio de banquete */
    foreach ($servicios as $servicio) {
        $existe = strpos(Str::upper($servicio->nombre), 'BANQUETE') or strpos($servicio->nombre, 'Banquete');
        return true;
    }
    return false;
   }

   public function bocadillosExistTrait(evento $evento){
    $servicios = $evento->servicio()->get();
    /* Validamos si hay un servicio de banquete */
    foreach ($servicios as $servicio) {
        $existe = strpos(Str::upper($servicio->nombre), 'BOCADILLOS') or strpos($servicio->nombre, 'Bocadillos');
        return true;
    }
    return false;
   }

}