<?php

namespace App\Traits;

use App\cotizacion;

/* Se encarga de los procesos de nuestra cotización */

Trait CotizacionTrait{
   public $dia;

    public function serviciosTrait(cotizacion $cotizacion){
        $servicios = $cotizacion->servicio;
        return $servicios;
    }

    public function costoCotizacion(cotizacion $cotizacion){
        /**Obtenemos todos los servicios de este evento */
      $servicios = $this->serviciosTrait($cotizacion);
      /**Validamos si cuenta con alguno de los servicios propios */
      $costoCotizacion=0;
      foreach ($servicios as $servicio ) {
         /* Aqui obtenemos el costo del evento
         El costo multiplicada por la cantidad*/
         if ($servicio->pivot->regalo == 0 ) {
            $costoCotizacion = $servicio->pivot->costo  * $servicio->pivot->cantidad + $costoCotizacion;
         }
      }
      return $costoCotizacion;
    }

    public function diaCotizacion(cotizacion $cotizacion){
        $fechacotizacion = cotizacion::select()->whereId($cotizacion->id)->first();
        $fechacotizacion = date('w',strtotime($fechacotizacion->start));
        /* Validamos si es alguno de los días */
      
        
        if ($fechacotizacion<=4 Or $fechacotizacion == 7) {
           $this->dia = 0;
        }
        else{
           $this->dia = 1;
        }
        return $this->dia;
     }
  
     public function añoCotizacion(cotizacion $cotizacion){
        /* Obtenemos el año del cotizacion */
        $fechacotizacion = cotizacion::select()->whereId($cotizacion->id)->first();
        $fechacotizacion = date('Y',strtotime($fechacotizacion->start));
        return $fechacotizacion;
     }

}